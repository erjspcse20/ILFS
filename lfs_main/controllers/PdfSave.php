<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfSave extends MY_Controller
{
    public function index()
    {
        $html="";

        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
        //$datarule["rule"] = $rule;
        //$this->load->view('pages/rule', $datarule, true);
        //$this->load->view('pages/bill1', $data);
        ini_set('memory_limit', '256M');
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $data['title'] = "genrateBill";
        $html .= $this->load->view('pages/bill', $data, true);
        //$datarule["rule"] = $rule;
        //$html .= $this->load->view('pages/rule', $datarule, true);
        $pdf->WriteHTML($html);
        $output = 'upload/bill/' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
    }
}