<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_auth extends CI_Controller {
    public function index() {
        $this->load->view('layar/auth_header_login');
        $this->load->view('auth/login');
        $this->load->view('layar/auth_footer');

    }
    public function cekLogin()
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
    
        // cek
        if ($user == "admin" && $pass == "admin123") {
            $this->crud_usr();
        } 
        else if($user == "user1" && $pass == "user1"){
            $this->restaurant_home();
        }
        else {
            $this->index();
        }
        
    }
    public function register() {
        $this->load->view('layar/auth_header_register');
        $this->load->view('auth/register');
        $this->load->view('layar/auth_footer');
    }
    public function crud_usr()
    {
        $this->load->view('admin/v_adm_usr');
    }
    public function crud_menu()
    {
        $this->load->view('admin/v_adm_menu');
    }

    public function restaurant_home()
    {
        $this->load->view('layar/auth_header_burgerin');
        $this->load->view('burgerin/v_index_burgerin');
        $this->load->view('layar/auth_footer_burgerin');
    }

    public function restaurant_menu()
    {
        $this->load->view('layar/auth_header_burgerin');
        $this->load->view('burgerin/v_menu_burgerin');
        $this->load->view('layar/auth_footer_burgerin');
    }

    public function restaurant_book()
    {
        $this->load->view('layar/auth_header_burgerin');
        $this->load->view('burgerin/v_book_burgerin');
        $this->load->view('layar/auth_footer_burgerin');
    }

    public function restaurant_about()
    {
        $this->load->view('layar/auth_header_burgerin');
        $this->load->view('burgerin/v_about_burgerin');
        $this->load->view('layar/auth_footer_burgerin');
    }
}