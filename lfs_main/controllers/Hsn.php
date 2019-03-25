<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hsn extends MY_Controller {

    public function index()
    {
        $data["pageName"]='addHsn';
        $this->load->view('Home',$data);
    }
    public function AddHsn()
    {
        $Name = $this->input->post('Name');
        if(!empty($Name)) {
            $InsQry = "INSERT INTO `hsn`(`uuid`, `name`, `created_by`, `created_at`) 
                    VALUES (uuid(),'" . $Name . "','" . $this->session->userdata('uuid') . "',NOW());";
            if($this->CommonModel->create($InsQry))
            {
                $this->_flashMessage(1,"Save successfuly","error occure");;
            }
            else
            {
                //echo "error occure";
                $this->_flashMessage(0,"Save successfuly","error occure");;
            }//echo $this->db->last_query();exit;
            return redirect('welcome-to-ilfs-hsn-list.jsp');
        }else{
            $data["pageName"]='addHsn';
            $this->_flashMessage(0,"Save successfuly","Please Enter Name");;
            $this->load->view('Home',$data);
        }
    }
    public function HsnList()
    {
        $qry="select uuid,name
                from hsn order by ainc desc;";
        $agent=$this->CommonModel->ExecuteDirectQry($qry);
        /* echo "<pre>";
         print_r($agent);
         echo "<pre>";*/
        $data["UserData"]=$agent;
        $data["pageName"]='hsnList';
        $this->load->view('Home',$data);
    }
    public function EditHsn($para=null)
    {
        if($para){
            $qry="select uuid,name
            from hsn 
            where uuid='".$para."' order by ainc desc;";
            $vistor=$this->CommonModel->ExecuteDirectQry($qry,1);
            /*echo "<pre>";
            print_r($vistor);
            echo "<pre>";*/
            $data["UserData"]=$vistor;
            $data["pageName"]='addHsn';
            $this->load->view('Home',$data);
        }else{
            $data["pageName"]='addHsn';
            $this->load->view('Home',$data);
        }


    }
    public function UpdateHsn()
    {
        $Name = $this->input->post('Name');
        $Hsnid = $this->input->post('hsnid');
        if(!empty($Name) && !empty($Hsnid))
        {
            $InsQry = "Update hsn set name='" . $Name . "',updated_at=now(),updated_by='" . $this->session->userdata('uuid') . "' where uuid='".$Hsnid."';";
            if($this->CommonModel->create($InsQry))
            {
                $this->_flashMessage(1,"Updated successfuly","error occure");;
            }
            else
            {
                $this->_flashMessage(0,"Save successfuly","error occure");;
            }
            return redirect('welcome-to-ilfs-hsn-list.jsp');
        }else{
            $data["pageName"]='addHsn';
           // $data["ErrorMsg"]='All Field Are Mendetory';
            $this->_flashMessage(0,"Save successfuly","All Field Are Mendetory");;
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