<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function index() {
        $this->load->view('layar/auth_header_login');
        $this->load->view('auth/login');
        $this->load->view('layar/auth_footer');
    }
    
    public function register() {
        $this->load->view('layar/auth_header_register');
        $this->load->view('auth/register');
        $this->load->view('layar/auth_footer');
    }
}