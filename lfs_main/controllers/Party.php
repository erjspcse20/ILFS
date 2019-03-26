<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Party extends MY_Controller {

    public function index()
    {
        $data["pageName"]='addParty';
        $this->load->view('Home',$data);
    }
    public function AddParty()
    {
        $Name = $this->input->post('Name');
        $Email = $this->input->post('Email');
        $Phone = $this->input->post('Phone');
        $Address = $this->input->post('Address');
        $Gst = $this->input->post('Gst');
        if($Name!="") {
            $InsQry = "INSERT INTO `party`(`uuid`, `name`, `mobile`, `email`, `gst_no`, `address`, `created_by`, `created_at`) 
                    VALUES (uuid(),'" . $Name . "','" . $Phone . "','" . $Email . "','" . $Gst . "','" . $Address . "','" . $this->session->userdata('uuid') . "',NOW());";
            if($this->CommonModel->create($InsQry))
            {
                $this->_flashMessage(1,"Save successfuly","error occure");;
            }
            else
            {
                $this->_flashMessage(0,"Save successfuly","error occure");;
            }
            //echo $this->db->last_query();exit;
            return redirect('welcome-to-ilfs-party-list.jsp');
        }else{
            $data["pageName"]='addParty';
            $data["ErrorMsg"]='Please Enter Name';
            $this->_flashMessage(0,"Save successfuly","UserName Must be unique");;
            $this->load->view('Home',$data);
        }
    }
    public function PartyList()
    {
        $qry="select uuid,name,mobile,email,address,gst_no
                from party order by ainc desc;";
        $agent=$this->CommonModel->ExecuteDirectQry($qry);
        /* echo "<pre>";
         print_r($agent);
         echo "<pre>";*/
        $data["UserData"]=$agent;
        $data["pageName"]='partyList';
        $this->load->view('Home',$data);
    }
    public function EditParty($para=null)
    {
        if($para){
            $qry="select uuid,name,mobile,email,address,gst_no
            from party 
            where uuid='".$para."' order by ainc desc;";
            $vistor=$this->CommonModel->ExecuteDirectQry($qry,1);
            /*echo "<pre>";
            print_r($vistor);
            echo "<pre>";*/
            $data["UserData"]=$vistor;
            $data["pageName"]='addParty';
            $this->load->view('Home',$data);
        }else{
            $data["pageName"]='addParty';
            $this->load->view('Home',$data);
        }


    }
    public function UpdateParty()
    {
        $Name = $this->input->post('Name');
        $Email = $this->input->post('Email');
        $Phone = $this->input->post('Phone');
        $Address = $this->input->post('Address');
        $Gst = $this->input->post('Gst');
        $Partyid = $this->input->post('partyid');
        if(!empty($Name) && !empty($Partyid))
        {
            $InsQry = "Update party set name='" . $Name . "',mobile='" . $Phone . "',gst_no='" . $Gst . "',email='" . $Email . "',address='" . $Address . "',updated_at=now(),updated_by='" . $this->session->userdata('uuid') . "' where uuid='".$Partyid."';";
            if($this->CommonModel->create($InsQry))
            {
                $this->_flashMessage(1,"Updated successfuly","error occure");;
            }
            else
            {
                //echo "error occure";
                $this->_flashMessage(0,"Save successfuly","error occure");;
            }//echo $this->db->last_query();exit;
            return redirect('welcome-to-ilfs-party-list.jsp');
        }else{
            $data["pageName"]='addParty';
            $this->_flashMessage(0,"Save successfuly","Please Enter Name");;
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