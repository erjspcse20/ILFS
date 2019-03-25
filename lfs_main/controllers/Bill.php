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
        $PartyId = $this->input->post('party');
        $HsnId = $this->input->post('hsn');
        $ProductId = $this->input->post('product');
        $FromDt = $this->input->post('FromDt');
        $ToDt = $this->input->post('ToDt');
        $qry="select i.*,p.name as PartyName,p.address as PartyAddress,p.gst_no as party_gst_no,h.name as HsnCode,pr.name as ProductName
                from Item i
                 left join party p on p.uuid=i.party_id
                 left join product pr on pr.uuid=i.product_id
                 left join hsn h on h.uuid=i.hsn_id
                 where i.is_deleted=false ".((!empty($PartyId))?" and i.party_id='".$PartyId."'":"")." ".((!empty($HsnId))?" and i.hsn_id='".$HsnId."'":"")." ".((!empty($ProductId))?" and i.product_id='".$ProductId."'":"")." 
                 order by i.a_inc desc;";
        $agent=$this->CommonModel->ExecuteDirectQry($qry);

        $data["ItemData"]=$agent;
        $data["pageName"]='billList';
        $this->load->view('Home',$data);
    }
    public function GenrateBill()
    {
         echo "<pre>";
         print_r($_REQUEST);
         echo "<pre>";exit;
        $html="";
        ini_set('memory_limit', '256M');
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $data['title'] = "genrateBill";
        $html .= $this->load->view('pages/bill', $data, true);
        //$datarule["rule"] = $rule;
        //$html .= $this->load->view('pages/rule', $datarule, true);
        $pdf->WriteHTML($html);
        $output = 'upload/bill/' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');


    }
    public function UpdateItem()
    {
        $HsnId = $this->input->post('hsn');
        $Name = $this->input->post('Name');
        $Itemid = $this->input->post('Itemid');
        if(!empty($HsnId) && !empty($Name) && !empty($Itemid))
        {
            $InsQry = "Update Item set name='" . $Name . "',hsn_id='" . $HsnId . "',updated_at=now(),updated_by='" . $this->session->userdata('uuid') . "' where uuid='".$Itemid."';";
            if($this->CommonModel->create($InsQry))
            {
                $this->_flashMessage(1,"Updated successfuly","error occure");;
            }
            else
            {
                //echo "error occure";
                $this->_flashMessage(0,"Save successfuly","error occure");;
            }//echo $this->db->last_query();exit;
            return redirect('welcome-to-ilfs-Item-list.jsp');
        }else{
            $data["pageName"]='addItem';
            $this->_flashMessage(0,"Save successfuly","Hsn code and  Name is medetory");;
            $this->load->view('Home',$data);
        }
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