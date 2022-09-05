<?php



/*

 * To change this template, choose Tools | Templates

 * and open the template in the editor.

 */



class Mod_login extends CI_Model {



    function __construct() {

        parent::__construct();

    }



    

    function getData($k){

        $query = $this->db->query($k);

        $hasil = array();

        $hasil = $query->result();

        return $hasil;

    }

    

    function exeSQLInsert($sql){

        $query = $this->db->query($sql);        

    }

    

    function exeSQL($sql){

        $query = $this->db->query($sql);

        $hasil = array();

        $hasil = $query->result();

        return $hasil;

    }

    

    function checkAuth($username, $password) {

        $query = $this->db->query("

            SELECT tl.*

            FROM tbl_user tl            

            WHERE aktif = '1' and tl.username = '$username' AND tl.password = '" . md5($password) . "'");



        if ($query->num_rows() > 0) {



            $data = $query->row_array();

            $sessionArray = array(

                "logged_in" => TRUE,                

                "username" => $username,

                "password" => md5($password),

                "role" => $data['role'],

                "nama"=>$data['nama'],

                "email"=>$data['email'],

                "id"=>$data['id']

            );

            $this->session->set_userdata($sessionArray);

            return TRUE;

        } else {

            return FALSE;

        }

    }



   

    

    public function check_session_petani() {

        if ($this->session->userdata("logged_in") == "1" AND $this->session->userdata("role") == "2") {

            return TRUE;

        } else {

            return FALSE;

        }

    }



    public function check_session_dinas() {

        if ($this->session->userdata("logged_in") == "1" AND $this->session->userdata("role") == "3") {

            return TRUE;

        } else {

            return FALSE;

        }

    }

    

    public function check_session_gudang() {

        if ($this->session->userdata("logged_in") == "1" AND $this->session->userdata("role") == "4") {

            return TRUE;

        } else {

            return FALSE;

        }

    }

    

    public function check_session_perbankan() {

        if ($this->session->userdata("logged_in") == "1" AND $this->session->userdata("role") == "7") {

            return TRUE;

        } else {

            return FALSE;

        }

    }

    

    public function check_session_tenagatani() {

        if ($this->session->userdata("logged_in") == "1" AND $this->session->userdata("role") == "8") {

            return TRUE;

        } else {

            return FALSE;

        }

    }

    

    public function check_session_deliver() {

        if ($this->session->userdata("logged_in") == "1" AND $this->session->userdata("role") == "9") {

            return TRUE;

        } else {

            return FALSE;

        }

    }

    

    public function check_session_kasir() {

        if ($this->session->userdata("logged_in") == "1" AND $this->session->userdata("role") == "5") {

            return TRUE;

        } else {

            return FALSE;

        }

    }

    

    public function check_session_pelakuusaha() {

        if ($this->session->userdata("logged_in") == "1" AND $this->session->userdata("role") == "6") {

            return TRUE;

        } else {

            return FALSE;

        }

    }

    

    public function check_session_admin() {

        if ($this->session->userdata("logged_in") == "1" AND $this->session->userdata("role") == "1") {

            return TRUE;

        } else {

            return FALSE;

        }

    }





}



?>