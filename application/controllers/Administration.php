<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // if (!$this->session->userdata('id_usuario'))
        // {
        //     redirect(base_url().'administration/login/');
        // }
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('landing');
		$this->load->view('footer');
	}

	function login() {
	    // $this->load->model('Users_model');

	    // $nombre_usuario = $this->security->xss_clean(strip_tags($this->input->post('username')));
	    // $pass = md5($this->security->xss_clean(strip_tags($this->input->post('password'))));

	    // $remember = ($this->input->post('recordar') == NULL )? false : true;

	    // $this->Users_model->login($nombre_usuario, $pass, $remember);


	    // if (!$this->session->userdata('id_usuario'))
	    // {
	    //     redirect('usuarios/index/fail');
	    // }
	    // else
	    // {    

     //    	redirect(base_url().'administration/index');
    	// }
    	$this->load->view('/administration/login');
	}
}
