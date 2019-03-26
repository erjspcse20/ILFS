<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class FileController extends CI_Controller {
    public function __construct() {
        parent::__construct ();
        $this->load->helper('download');
    }

    public function index() {
    }

    public function download($fileName = NULL,$fileName2 = NULL,$fileName3 = NULL) {
        if ($fileName3) {
            echo $file = realpath ( "upload/bill" ) . "\\" . $fileName3;//exit;
            // check file exists
            if (file_exists ( $file )) {
                // get file content
                $data = file_get_contents ( $file );
                //force download
                force_download ( $fileName3, $data );
            } else {
                // Redirect to base url
                redirect ( base_url () );
            }
        }
    }
}