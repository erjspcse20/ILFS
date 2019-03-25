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
        print_r($_REQUEST);
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
            $IgstCalc=$TaxCalculated/2;
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
            }//echo $this->db->last_query();exit;
            return redirect('welcome-to-ilfs-item-list.jsp');
        }else{
            $this->_flashMessage(0,"Save successfuly","Please Provide Medetory field");
            $data["pageName"]='addItem';
            $this->load->view('Home',$data);
        }

    }
    public function ItemList()
    {
        $PartyId = $this->input->post('party');
        $HsnId = $this->input->post('hsn');
        $ProductId = $this->input->post('product');
        $FromDt = $this->input->post('FromDt');
        $ToDt = $this->input->post('ToDt');
        $Item="select i.*,p.name as PartyName,p.address as PartyAddress,p.gst_no as party_gst_no,h.name as HsnCode,pr.name as ProductName
                from Item i
                 left join party p on p.uuid=i.party_id
                 left join product pr on pr.uuid=i.product_id
                 left join hsn h on h.uuid=i.hsn_id
                 where i.is_deleted=false ".((!empty($PartyId))?" and i.party_id='".$PartyId."'":"")." ".((!empty($HsnId))?" and i.hsn_id='".$HsnId."'":"")." ".((!empty($ProductId))?" and i.product_id='".$ProductId."'":"")." 
                 order by i.a_inc desc;";
        $Item=$this->CommonModel->ExecuteDirectQry($Item);
        /* echo "<pre>";
         print_r($agent);
         echo "<pre>";*/
        $data["ItemData"]=$Item;
        $data["pageName"]='ItemList';
        $this->load->view('Home',$data);
    }
    public function EditItem($para=null)
    {
        if($para){
            $qry="select uuid,name,name,hsn_id
            from Item
            where uuid='".$para."';";
            $vistor=$this->CommonModel->ExecuteDirectQry($qry,1);
            /*echo "<pre>";
            print_r($vistor);
            echo "<pre>";*/
            $data["ItemData"]=$vistor;
            $data["pageName"]='addItem';
            $this->load->view('Home',$data);
        }else{
            $data["pageName"]='addUser';
            $this->load->view('Home',$data);
        }


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