<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataLoad extends MY_Controller
{
    public function index()
    {
        $data["pageName"] = 'homePage';
        $this->load->view('Home', $data);
    }

    public function hsnList()
    {
        $qry = "select uuid,name from hsn;";
        $hsndata = $this->CommonModel->ExecuteDirectQry($qry);
        echo json_encode($hsndata);
    }
    public function partyList()
    {
        $qry = "select uuid,name from party;";
        $partydata = $this->CommonModel->ExecuteDirectQry($qry);
        echo json_encode($partydata);
    }
    public function partyDetail()
    {
        $PartyId=$this->input->post('Party');
        $qry = "select uuid,name,address,mobile,email,gst_no from party where uuid='".$PartyId."';";
        $partydata = $this->CommonModel->ExecuteDirectQry($qry,1);
        echo json_encode($partydata);
    }
    public function productList()
    {
        $HsnId=$this->input->post('hsn');
        if($HsnId!="")
        {
            $qryprod = "select uuid,name from product where hsn_id='".$HsnId."';";
            $proddata = $this->CommonModel->ExecuteDirectQry($qryprod);
            echo json_encode($proddata);
        }else{
            echo null;
        }
    }
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CommonModel');
    }
}
?>