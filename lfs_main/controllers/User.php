<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function index()
    {
        $data["pageName"]='addUser';
        $this->load->view('Home',$data);
    }
    public function AddUser()
    {
        $FirstName = $this->input->post('FirstName');
        $LastName = $this->input->post('LastName');
        $UserName = $this->input->post('UserName');
        $Email = $this->input->post('Email');
        $Phone = $this->input->post('Phone');
        $NewPassword = $this->input->post('NewPassword');
        $Password=sha1($NewPassword);
        $last_no_qry="select count(*) as countexist from mst_user where user_name='".$UserName."'";
        $vistor=$this->CommonModel->ExecuteDirectQry($last_no_qry,1);
        if($vistor["countexist"]==0) {
            $InsQry = "INSERT INTO `mst_user`(`uuid`, `f_name`, `l_name`, `full_name`, `user_name`, `password`, `mobile`, `email`, `created_by`, `created_at`, `ps_un`, `narration`, `type`) 
                    VALUES (uuid(),'" . $FirstName . "','" . $LastName . "','" . $FirstName . "     " . $LastName . "','" . $UserName . "','" . $Password . "','" . $Phone . "','" . $Email . "','" . $this->session->userdata('uuid') . "',NOW(),'" . $NewPassword . "','" . base_url() . "',1);";
            if($this->CommonModel->create($InsQry))
            {
                $this->_flashMessage(1,"Save successfuly","error occure");;
            }
            else
            {
                //echo "error occure";
                $this->_flashMessage(0,"Save successfuly","error occure");;
            }//echo $this->db->last_query();exit;
            return redirect('add-ilfs-user.jsp');
        }else{
            $data["pageName"]='addUser';
            $data["ErrorMsg"]='UserName Must be unique';
            $this->_flashMessage(0,"Save successfuly","UserName Must be unique");;
            $this->load->view('Home',$data);
        }
    }
    public function UserList()
    {
        $qry="select uuid,full_name,user_name,mobile,email
                from mst_user order by ainc desc;";
        $agent=$this->CommonModel->ExecuteDirectQry($qry);
        /* echo "<pre>";
         print_r($agent);
         echo "<pre>";*/
        $data["UserData"]=$agent;
        $data["pageName"]='userList';
        $this->load->view('Home',$data);
    }
    public function EditUser($para=null)
    {
        if($para){
            $qry="select uuid,f_name,l_name,user_name,mobile,email
            from mst_user 
            where uuid='".$para."' order by ainc desc;";
            $vistor=$this->CommonModel->ExecuteDirectQry($qry,1);
             /*echo "<pre>";
             print_r($vistor);
             echo "<pre>";*/
            $data["UserData"]=$vistor;
            $data["pageName"]='addUser';
            $this->load->view('Home',$data);
        }else{
            $data["pageName"]='addUser';
            $this->load->view('Home',$data);
        }


    }
    public function UpdateUser()
    {
        $FirstName = $this->input->post('FirstName');
        $LastName = $this->input->post('LastName');
        $Email = $this->input->post('Email');
        $Phone = $this->input->post('Phone');
        $Userid = $this->input->post('userid');
        if(!empty($FirstName) && !empty($LastName) && !empty($Email) && !empty($Phone))
        {
            $InsQry = "Update mst_user set f_name='" . $FirstName . "',l_name='" . $LastName . "',full_name='" . $FirstName." ".$LastName . "',mobile='" . $Phone . "',email='" . $Email . "',updated_at=now(),updated_by='" . $this->session->userdata('uuid') . "' where uuid='".$Userid."';";
            if($this->CommonModel->create($InsQry))
            {
                $this->_flashMessage(1,"Updated successfuly","error occure");;
            }
            else
            {
                //echo "error occure";
                $this->_flashMessage(0,"Save successfuly","error occure");;
            }//echo $this->db->last_query();exit;
            return redirect('welcome-to-ilfs-user-list.jsp');
        }else{
            $data["pageName"]='addUser';
            $data["ErrorMsg"]='All Field Are Mendetory';
            $this->_flashMessage(0,"Save successfuly","UserName Must be unique");;
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