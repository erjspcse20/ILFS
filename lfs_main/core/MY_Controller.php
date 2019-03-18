<?php
class MY_Controller extends CI_Controller
{
	public function __construct()
 	{
 		parent::__construct();
        if($this->session->userdata('uuid')=="")
        {
            return redirect(base_url('welecome-to-ilfs-login.jsp'));
        }
        date_default_timezone_set("Asia/Kolkata");
	}
	public function IsLogOut()
	{
	    $UserId=$this->session->userdata('uuid');

        if($UserId=="")
        {
            return redirect(base_url('welecome-to-ilfs-login.jsp'));
        }

		/*$SesionID=$this->session->userdata('Singla_SesID');
		$this->load->model('CommonModel');
		 $colsN='ID';
		 $TableN='LogInLog';
		 $whereArrN="ID='".$SesionID."' and LogOut is null";
		 $orderByArrN[0]=array();
		 $ResData=$this->CommonModel->getDataFromNormalSelect($colsN,$TableN,$whereArrN,$orderByArrN);
		 if(count($ResData)==0)
		 {
			 return redirect('Login');
		 }*/
	}
	public function GUID()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}
		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}

	
}