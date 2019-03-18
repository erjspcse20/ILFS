<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

    public function index()
    {
        $data["pageName"]='addProduct';
        $this->load->view('Home',$data);
    }
    public function AddProduct()
    {
        $HsnId = $this->input->post('hsn');
        $Name = $this->input->post('Name');
        if(!empty($HsnId) && !empty($Name)) {
            $InsQry = "INSERT INTO `product`(`uuid`, `hsn_id`, `name`, `created_by`, `created_at`) 
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
            return redirect('welcome-to-ilfs-product-list.jsp');
        }else{
            $data["pageName"]='addProduct';
            $this->_flashMessage(0,"Save successfuly","Hsn code and  Name is medetory");;
            $this->load->view('Home',$data);
        }
    }
    public function ProductList()
    {
        $qry="select p.uuid,p.name,h.name as hsncode
                from product p
                 left join hsn h on p.hsn_id=h.uuid
                 order by ainc desc;";
        $agent=$this->CommonModel->ExecuteDirectQry($qry);
        /* echo "<pre>";
         print_r($agent);
         echo "<pre>";*/
        $data["ProductData"]=$agent;
        $data["pageName"]='productList';
        $this->load->view('Home',$data);
    }
    public function EditProduct($para=null)
    {
        if($para){
            $qry="select uuid,name,name,hsn_id
            from product
            where uuid='".$para."';";
            $vistor=$this->CommonModel->ExecuteDirectQry($qry,1);
            /*echo "<pre>";
            print_r($vistor);
            echo "<pre>";*/
            $data["ProductData"]=$vistor;
            $data["pageName"]='addProduct';
            $this->load->view('Home',$data);
        }else{
            $data["pageName"]='addUser';
            $this->load->view('Home',$data);
        }


    }
    public function UpdateProduct()
    {
        $HsnId = $this->input->post('hsn');
        $Name = $this->input->post('Name');
        $Productid = $this->input->post('productid');
        if(!empty($HsnId) && !empty($Name) && !empty($Productid))
        {
            $InsQry = "Update product set name='" . $Name . "',hsn_id='" . $HsnId . "',updated_at=now(),updated_by='" . $this->session->userdata('uuid') . "' where uuid='".$Productid."';";
            if($this->CommonModel->create($InsQry))
            {
                $this->_flashMessage(1,"Updated successfuly","error occure");;
            }
            else
            {
                //echo "error occure";
                $this->_flashMessage(0,"Save successfuly","error occure");;
            }//echo $this->db->last_query();exit;
            return redirect('welcome-to-ilfs-product-list.jsp');
        }else{
            $data["pageName"]='addProduct';
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