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
        $HsnId = $this->input->post('hsn');
        $Name = $this->input->post('Name');
        if(!empty($HsnId) && !empty($Name)) {
            $InsQry = "INSERT INTO `item`(`uuid`, `hsn_id`, `name`, `created_by`, `created_at`) 
                    VALUES (uuid(),'" . $HsnId . "','" . $Name . "','" . $this->session->userdata('uuid') . "',NOW());";
            if($this->CommonModel->create($InsQry))
            {
                $this->_flashMessage(1,"Save successfuly","error occure");;
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
    public function ItemList()
    {
        $qry="select p.uuid,p.name,h.name as hsncode
                from Item p
                 left join hsn h on p.hsn_id=h.uuid
                 order by ainc desc;";
        $agent=$this->CommonModel->ExecuteDirectQry($qry);
        /* echo "<pre>";
         print_r($agent);
         echo "<pre>";*/
        $data["ItemData"]=$agent;
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