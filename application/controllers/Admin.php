<?php

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mod_login', 'login', TRUE); 
        if (!$this->login->check_session_admin()) {
            $this->logout();
            redirect("");
        }
    }

    function index() {
        $data['error'] = "";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/depan');
        $this->load->view('admin/footer');
    }

    
    function logout() {
        $this->session->sess_destroy();
        redirect();
    }


}

?>