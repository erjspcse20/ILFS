<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class FileController extends MY_Controller {
    public function __construct() {
        parent::__construct ();
        $this->load->helper('download');
    }

    public function index() {
    }

    public function download($fileName = NULL,$fileName2 = NULL,$fileName3 = NULL) {
        if ($fileName3) {
            echo $file = realpath ( "upload/bill" ) . "\\/" . $fileName3;exit;
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
    public function downloadfgt($fileName = NULL,$fileName2 = NULL,$fileName3 = NULL){
        echo $file = realpath ( "" ) . "/upload/bill/" . $fileName3;//exit;
        $data = file_get_contents($file);
        force_download($fileName3, $data);
    }
    function push_file($fileName = NULL,$fileName2 = NULL,$fileName3 = NULL)
    {
        $path="upload/bill";//exit;
        $name=$fileName3;
        // make sure it's a file before doing anything!
        if(is_file($path))
        {
            // required for IE
            if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

            // get the file mime type using the file extension
            $this->load->helper('file');

            $mime = get_mime_by_extension($path);

            // Build the headers to push out the file properly.
            header('Pragma: public');     // required
            header('Expires: 0');         // no cache
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($path)).' GMT');
            header('Cache-Control: private',false);
            header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
            header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: '.filesize($path)); // provide file size
            header('Connection: close');
            readfile($path); // push it out
            exit();
        }
    }
}