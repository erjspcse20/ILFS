<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller {

    public function index()
    {
        $data["pageName"]='invoiceList';
        $this->load->view('Home',$data);
    }
    public function InvoiceList()
    {
        $qryinvoice="select i.*,p.name as PartyName from invoice i left join party p on i.party_id=p.uuid order by ainc desc;";
        $invoicedata=$this->CommonModel->ExecuteDirectQry($qryinvoice);
        /* echo "<pre>";
         print_r($agent);
         echo "<pre>";*/
        $data["InvoiceData"]=$invoicedata;
        $data["pageName"]='invoiceList';
        $this->load->view('Home',$data);
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