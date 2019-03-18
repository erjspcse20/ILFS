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
        $airlinedata = $this->CommonModel->ExecuteDirectQry($qry);
        echo json_encode($airlinedata);

    }
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CommonModel');
    }
}
?>