<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends MY_Controller {
	public function index()
	{
		$data["pageName"]='404';
		$this->load->view('Home',$data);
	}
}
?>
