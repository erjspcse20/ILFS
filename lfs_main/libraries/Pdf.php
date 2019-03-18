<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH .'third_party/mpdf/mpdf.php';
class Pdf {

    function __construct(){
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }

    function load($param = NULL) {


        if ($param == NULL) {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';
        }
        return new mPDF($param);
    }

}