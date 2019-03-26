<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends MY_Controller {

    public function index()
    {
        $data["pageName"]='addItem';
        $this->load->view('Home',$data);
    }
    public function AddItem()
    {
        //print_r($_REQUEST);
        $PartyId = $this->input->post('party');
        $HsnId = $this->input->post('hsn');
        $ProductId = $this->input->post('product');
        $Type = $this->input->post('Type');
        $Quantity = $this->input->post('Quantity');//exit;
        $Rate = $this->input->post('Rate');
        $CalculatedAmount = $this->input->post('CalculatedAmount');
        $Category = $this->input->post('Category');
        $TransportCharge = $this->input->post('TransportCharge');
        $GstType = $this->input->post('GstType');
        $Gst = $this->input->post('Gst');
        $TaxCalculated = $this->input->post('TaxCalculated');
        $AmountWithTax = $this->input->post('AmountWithTax');
        $Dimension = $this->input->post('Dimension');
        $VehicleNo = $this->input->post('VehicleNo');
        $GPNO = $this->input->post('GPNO');
        $StateOfSupply = $this->input->post('StateOfSupply');
        $PaymentMode = $this->input->post('PaymentMode');
        $ReceivedAmount = ($this->input->post('ReceivedAmount')=="")?0:$this->input->post('ReceivedAmount');
        $RestAmount = ($this->input->post('RestAmount')=="")?0:$this->input->post('RestAmount');

        $Sgst=0;
        $Cgst=0;
        $Igst=0;
        $SgstCalc=0;
        $CgstCalc=0;
        $IgstCalc=0;
        if($GstType==1){
            $Igst=$Gst;
            $IgstCalc=$TaxCalculated;
        }elseif ($GstType==2){
            $Sgst=$Gst/2;
            $Cgst=$Gst/2;
            $CgstCalc=$TaxCalculated/2;
            $SgstCalc=$TaxCalculated/2;
        }
        $last_no_qry="select max(a_inc) as sequence from item";
        $vistor=$this->CommonModel->ExecuteDirectQry($last_no_qry,1);
        if($vistor["sequence"]>0){
            $lastNo=$vistor["sequence"]+1;
            $Sequence="IFLS".date("YM").$lastNo;
        }else{
            $lastNo=2000;
            $Sequence="IFLS".date("YM")."1";
        }
        if($Quantity!="" && $Rate!="" && $CalculatedAmount!="" && $TransportCharge!="" && $TaxCalculated!="" && $GstType!="" && $AmountWithTax!="")
        {
            $InsQry = "INSERT INTO `item`(`uuid`,`item_published_id`, `party_id`, `product_id`, `hsn_id`, `created_at`, `created_by`, `type`, `quantity`, `rate`, `calculated_amount`, `category`, `transport_charge`, `total_gst`, `sgst`, `cgst`, `igst`, `gst_type`, `total_igst_calculated`, `total_sgst_calculated`, `total_cgst_calculated`, `amount_with_tax`, `dimension`, `vahical_no`, `gp_no`, `state_of_supply`, `mode_of_payment`, `recived_amount`, `rest_amount`)
                    VALUES (uuid(),'" . $Sequence . "','" . $PartyId . "','" . $ProductId . "','" . $HsnId . "',NOW(),'" . $this->session->userdata('uuid') . "','" . $Type . "'," . $Quantity . "," . $Rate . "," . $CalculatedAmount . ",'" . $Category . "'," . $TransportCharge . "," . $TaxCalculated . "," . $Sgst . "," . $Cgst . "," . $Igst . "," . $GstType . "," . $IgstCalc . "," . $SgstCalc . "," . $CgstCalc . "," . $AmountWithTax . ",'" . $Dimension . "','" . $VehicleNo . "','" . $GPNO . "','" . $StateOfSupply . "','" . $PaymentMode . "'," . $ReceivedAmount . "," . $RestAmount . ");";
            if($this->CommonModel->create($InsQry))
            {
                $this->_flashMessage(1,"Save successfuly","error occure");//$ReceivedAmount$AmountWithTax$Quantity$Rate$CalculatedAmount$TransportCharge$RestAmount
            }
            else
            {
                //echo "error occure";
                $this->_flashMessage(0,"Save successfuly","error occure");
            }
            //echo $this->db->last_query();exit;
            return redirect('add-ilfs-item.jsp');
        }else{
            $this->_flashMessage(0,"Save successfuly","Please Provide Medetory field");
            $data["pageName"]='addItem';
            $this->load->view('Home',$data);
        }

    }
    public function ItemList()
    {
        $FromDate = $this->input->post('fromdate');
        $ToDate = $this->input->post('todate');
        $data["ToDate"]=($ToDate!="")?$ToDate:date("d-m-Y");
        $data["FromDate"]=($FromDate!="")?$FromDate:date("d-m-Y",strtotime('-10 days', strtotime(date("d-m-Y"))));
        $PartyId = $this->input->post('party');
        $ProductId = $this->input->post('product');
        $Itemqry="select i.*,p.name as PartyName,p.address as PartyAddress,p.gst_no as party_gst_no,h.name as HsnCode,pr.name as ProductName
                from Item i
                 left join party p on p.uuid=i.party_id
                 left join product pr on pr.uuid=i.product_id
                 left join hsn h on h.uuid=i.hsn_id
                 where i.is_deleted=0
                 order by i.a_inc desc;";
        /*$Item="select i.*,p.name as PartyName,p.address as PartyAddress,p.gst_no as party_gst_no,h.name as HsnCode,pr.name as ProductName
                from Item i
                 left join party p on p.uuid=i.party_id
                 left join product pr on pr.uuid=i.product_id
                 left join hsn h on h.uuid=i.hsn_id
                 where i.is_deleted=false ".((!empty($PartyId))?" and i.party_id='".$PartyId."'":"")." ".((!empty($HsnId))?" and i.hsn_id='".$HsnId."'":"")." ".((!empty($ProductId))?" and i.product_id='".$ProductId."'":"")." 
                 order by i.a_inc desc;";*/
        $Itemres=$this->CommonModel->ExecuteDirectQry($Itemqry);
        /* echo "<pre>";
         print_r($agent);
         echo "<pre>";*/
        $data["ItemData"]=$Itemres;
        $data["pageName"]='ItemList';
        $data["PartyId"]=$PartyId;
        $data["ProductId"]=$ProductId;
        $this->load->view('Home',$data);
    }
    public function EditItem($para=null)
    {

        if($para){
            $qry="select i.*,p.name as PartyName,p.email as PartyEmail,p.mobile as Partymobile,p.gst_no as Partygst,p.address as PartyAddress,p.gst_no as party_gst_no,h.name as HsnCode,pr.name as ProductName
                from Item i
                 left join party p on p.uuid=i.party_id
                 left join product pr on pr.uuid=i.product_id
                 left join hsn h on h.uuid=i.hsn_id
                 where i.uuid='".$para."' 
                 order by i.a_inc desc;";
            $itemedit=$this->CommonModel->ExecuteDirectQry($qry,1);
            /*echo "<pre>";
            print_r($vistor);
            echo "<pre>";*/
            $data["ItemData"]=$itemedit;
            $data["pageName"]='addItem';
            $this->load->view('Home',$data);
        }else{
            $data["pageName"]='addUser';
            $this->load->view('Home',$data);
        }


    }
    public function UpdateItem()
    {
        $Itemid = $this->input->post('itm');
        $PartyId = $this->input->post('party');
        $HsnId = $this->input->post('hsn');
        $ProductId = $this->input->post('product');
        $Type = $this->input->post('Type');
        $Quantity = $this->input->post('Quantity');//exit;
        $Rate = $this->input->post('Rate');
        $CalculatedAmount = $this->input->post('CalculatedAmount');
        $Category = $this->input->post('Category');
        $TransportCharge = $this->input->post('TransportCharge');
        $GstType = $this->input->post('GstType');
        $Gst = $this->input->post('Gst');
        $TaxCalculated = $this->input->post('TaxCalculated');
        $AmountWithTax = $this->input->post('AmountWithTax');
        $Dimension = $this->input->post('Dimension');
        $VehicleNo = $this->input->post('VehicleNo');
        $GPNO = $this->input->post('GPNO');
        $StateOfSupply = $this->input->post('StateOfSupply');
        $PaymentMode = $this->input->post('PaymentMode');
        $ReceivedAmount = ($this->input->post('ReceivedAmount')=="")?0:$this->input->post('ReceivedAmount');
        $RestAmount = ($this->input->post('RestAmount')=="")?0:$this->input->post('RestAmount');

        $Sgst=0;
        $Cgst=0;
        $Igst=0;
        $SgstCalc=0;
        $CgstCalc=0;
        $IgstCalc=0;
        if($GstType==1){
            $Igst=$Gst;
            $IgstCalc=$TaxCalculated;
        }elseif ($GstType==2){
            $Sgst=$Gst/2;
            $Cgst=$Gst/2;
            $CgstCalc=$TaxCalculated/2;
            $SgstCalc=$TaxCalculated/2;
        }
        if(!empty($HsnId) && !empty($Itemid) && !empty($PartyId) && !empty($ProductId))
        {
            $updateitemQry = "Update Item set party_id='" . $PartyId . "',hsn_id='" . $HsnId . "',quantity=" . $Quantity . ",category='" . $Category . "',transport_charge=" . $TransportCharge . ",total_cgst_calculated=" . $CgstCalc . ",total_sgst_calculated=" . $SgstCalc . ",total_igst_calculated=" . $IgstCalc . ",gst_type=" . $GstType . ",amount_with_tax=" . $AmountWithTax . ",dimension='" . $Dimension . "',vahical_no='" . $VehicleNo . "',gp_no='" . $GPNO . "',rest_amount=" . $RestAmount . ",recived_amount=" . $ReceivedAmount . ",mode_of_payment='" . $PaymentMode . "',state_of_supply='" . $StateOfSupply . "',igst=" . $Igst . ",sgst=" . $Sgst . ",cgst=" . $Cgst . ",total_gst=" . $TaxCalculated . ",rate=" . $Rate . ",calculated_amount=" . $CalculatedAmount . ",type='" . $Type . "',product_id='" . $ProductId . "',updated_at=now(),updated_by='" . $this->session->userdata('uuid') . "' where uuid='".$Itemid."';";//exit;
            $upres=$this->CommonModel->create($updateitemQry);
            if($upres)
            {
                $this->_flashMessage(1,"Updated successfuly","error occure");
                return redirect('add-ilfs-item.jsp');
            }
            else
            {
                //echo "error occure";
                $this->_flashMessage(0,"Save successfuly","error occure");
                return redirect('add-ilfs-item.jsp');
            }
            //echo $this->db->last_query();exit;

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