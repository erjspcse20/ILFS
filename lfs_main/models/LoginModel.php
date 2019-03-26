<?php
class LoginModel extends MY_Model
{
	public function loginvalidate($UserName,$Password)
	{
		$Password=sha1($Password);
		$loginData = $this->db->select("uuid,full_name,user_name,mobile,email,narration,type")
							->from('mst_user')
							->where(array('user_name'=>$UserName,'password'=>$Password))
							->get();
							
		return $result = $loginData->row_array();
	}
}