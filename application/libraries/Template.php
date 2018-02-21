<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }
    
    public function view_admin($view, $params = array()) {
        $data['_header']    = $this->CI->load->view('admin/header', '', TRUE);
        $data['_content'] = $this->CI->load->view('admin/' . $view, $params, TRUE);

        $this->CI->load->view('admin/template', $data);
    }
}