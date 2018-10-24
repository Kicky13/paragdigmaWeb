<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/InfluxDB/Client.php"; 
 
class InfluxDB { 
    public function __construct() { 
        parent::__construct(); 
    } 
}