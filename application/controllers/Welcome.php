<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


    public function __construct() {

        parent::__construct();

        $this->load->model('mod_login', 'login', TRUE);

    }



	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login() {

        $data['error'] = "";  

        $this->load->view('login/header', $data);
        $this->load->view('login/login');
        $this->load->view('login/footer');

    }


    public function dologin() {

        if (count($_POST)>0) {

            $userName = $this->antisqlinjection($this->input->post("username"));

            $password = $this->antisqlinjection($this->input->post("password"));

            $chkAuth = $this->login->checkAuth($userName, $password);

            if ($chkAuth) {

                if ($this->login->check_session_admin()) {

                    redirect('admin');

                /*} elseif ($this->login->check_session_pakar()) {

                    redirect('pakar');

                } elseif ($this->login->check_session_penyuluh()) {

                    redirect('penyuluh');

                } elseif ($this->login->check_session_perbankan()) {

                    redirect('perbankan');

                } elseif ($this->login->check_session_tenagatani()) {

                    redirect('tenagatani');

                } elseif ($this->login->check_session_pelakuusaha()) {

                    redirect('pelakuusaha');

                } elseif ($this->login->check_session_deliver()) {

                    redirect('deliver');

					*/

                } else {

                    redirect('');

                }

            } else {

                echo "<script>alert('Username / Password tidak ditemukan / tidak aktif.');window.location.href='login'</script>";

               // echo "Username / Password tidak ditemukan / tidak aktif.";

            }

        } else {

            echo "<script>alert('".count($_POST)."Username / Password harus diisi.');window.location.href='login'</script>";

        }

    }



    function antisqlinjection($value) {

        // Stripslashes

       // if (get_magic_quotes_gpc()) {

            $value = stripslashes($value);

       // }

        if (!is_numeric($value)) {

            $value = mysqli_real_escape_string($this->db->conn_id,$value);

        }

        return $value;

    }

}
