<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class json_control extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function uploadControl()
    {
        $text = $this->input->post('jsonContent');
        $directory = $this->input->post('saveDir');
        $title = $this->input->post('docTitle');
        $fname = $title . ".json";//generates random name
        $url = $_SERVER['DOCUMENT_ROOT'] . "/dev/DashboardBOD/jsonFile/" . $directory . "/" . $fname;

        $file = fopen($url, 'w');
        fwrite($file, $text);
        fclose($file);
        echo 'done';
    }
}