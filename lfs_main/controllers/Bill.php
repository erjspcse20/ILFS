<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill extends MY_Controller {

    public function index()
    {
        $data["pageName"]='billList';
        $this->load->view('Home',$data);
    }
    public function ItemList()
    {
        $agent=array();
        $FromDate = $this->input->post('fromdate');
        $ToDate = $this->input->post('todate');
        $data["ToDate"]=($ToDate!="")?$ToDate:date("d-m-Y");
        $data["FromDate"]=($FromDate!="")?$FromDate:date("d-m-Y",strtotime('-10 days', strtotime(date("d-m-Y"))));
        $PartyId = $this->input->post('party');
        if($PartyId!="")
        {
            $qry="select i.*,p.name as PartyName,p.address as PartyAddress,p.gst_no as party_gst_no,h.name as HsnCode,pr.name as ProductName
                from Item i
                 left join party p on p.uuid=i.party_id
                 left join product pr on pr.uuid=i.product_id
                 left join hsn h on h.uuid=i.hsn_id
                 where i.is_deleted=0 and i.bill_status=2 ".((!empty($PartyId))?" and i.party_id='".$PartyId."'":"")." ".((!empty($FromDate))?" and i.created_at>='".date("Y-m-d H:i:s",strtotime($FromDate))."'":"")." ".((!empty($ToDate))?" and i.created_at<='".date("Y-m-d H:i:s",strtotime($ToDate."23:59:59"))."'":"")." 
                 order by i.a_inc desc;";
            $agent=$this->CommonModel->ExecuteDirectQry($qry);
        }


        $data["ItemData"]=$agent;
        $data["PartyId"]=$PartyId;
        $data["pageName"]='billList';
        $this->load->view('Home',$data);
    }

    public function GenrateBill()
    {
        $ItemRes=array();
        $PartyRes=array();
        $Partyid = $this->input->post('party');
        $Itemid = $this->input->post('itemid');
        $BillType = $this->input->post('BillType');
        $billDate = $this->input->post('billDate');

         $partyQry="select * from party where uuid='".$Partyid."'";
         $PartyRes=$this->CommonModel->ExecuteDirectQry($partyQry,1);
            $InvoiceNo="";
        $invoiceQry="select max(ainc) as maxno from invoice";
        $InvRes=$this->CommonModel->ExecuteDirectQry($invoiceQry,1);
        $prefix=($BillType=="Tax Invoice")?"DL/JHA/":"DL/PJH/";
        $data['InvoiceNo'] = $prefix.date("M",strtotime($billDate))."/".date("y",strtotime($billDate))."/".(($InvRes["maxno"]="NULL")?"1":($InvRes["maxno"]+1));
        for($i=0;$i<count($Itemid);$i++){
            $itemQry="select i.*,h.name as hsnCode,p.name as productName from item i
                        left outer join hsn h on i.hsn_id=h.uuid
                        left outer join product p on i.product_id=p.uuid
                          where i.uuid='".$Itemid[$i]."'";
            $ItemRes[$i]=$this->CommonModel->ExecuteDirectQry($itemQry,1);
            $Qry[$i]="update item set bill_status=1,invoice_no='".$data['InvoiceNo']."' where uuid='".$Itemid[$i]."'";
            $InvoiceNo .=$ItemRes[$i]["item_published_id"]."^";
        }
         $html="";
        ini_set('memory_limit', '256M');
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $data['title'] = "genrateBill";
        $data['InvoiceNo'] = $prefix.date("M")."/".date("Y")."/".(($InvRes["maxno"]=="NULL")?"1":($InvRes["maxno"]+1));

        $data['PartyData'] = $PartyRes;
        $data['ItemData'] = $ItemRes;
        $data['BillType'] = $BillType;
        $data['BillDate'] = $billDate;
        $html .= $this->load->view('pages/printBill', $data, true);
        $pdf->WriteHTML($html);
        $output = 'upload/bill/' . date('Y_m_d_H_i_s') . '_.pdf';
        $Qry[(count($Itemid))]="INSERT INTO `invoice`(`uuid`, `prefix`, `custom_genrated_date`, `bill_type`, `item_no`, `invoice_no`, `created_at`, `created_by`, `pdf_name`, `party_id`)
                                  VALUES (uuid(),'" . $billDate . "','" .$BillType. "','" .$InvoiceNo. "','" .$InvoiceNo. "','" . $data['InvoiceNo'] . "',NOW(),'" . $this->session->userdata('uuid') . "','" . $output . "','" . $Partyid . "');";
        //print_r($Qry);exit;
        $this->CommonModel->createmultiquery($Qry);
        $pdf->Output("$output", 'F');
        $pdf->Output("$output", 'D');

        return redirect('lfs-bill-list.jsp');

    }

    private function _flashMessage($successful, $successmsg, $failuremsg)
    {
        if( $successful )
        {
            $this->session->set_flashdata('feedback',$successmsg);
            $this->session->set_flashdata('feedback_class','alert_success');
        }
        else
        {
            $this->session->set_flashdata('feedback',$failuremsg);
            $this->session->set_flashdata('feedback_class','alert_danger');
        }
    }
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CommonModel');
        $this->load->library('form_validation');
    }
}