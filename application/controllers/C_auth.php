<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller
{
    public function index()
    {
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
        } else if ($user == "user1" && $pass == "user1") {
            $this->restaurant_home();
        } else {
            $this->index();
        }
    }
    public function logout()
    {

        if (!isset($confirmed)) {
            $this->load->view('layar/auth_header_login');
            $this->load->view('auth/login');
            $this->load->view('layar/auth_footer');
        }
    }
    public function register()
    {
        $this->load->view('layar/auth_header_register');
        $this->load->view('auth/register');
        $this->load->view('layar/auth_footer');
    }

    public function crud_usr()
    {

        $data_user = $this->M_user->getAllUsers();
        $temp['data'] = $data_user;
        $this->load->view('admin/v_adm_usr', $temp);
    }

    // sdada
    public function insert_user_action()
    {
        $nama_user = $this->input->post('nama_user');
        $email_user = $this->input->post('email_user');
        $password_user = $this->input->post('password_user');

        $insert_data_user = array(
            'nama_user' =>  $nama_user,
            'email_user' =>  $email_user,
            'password_user' =>  $password_user
        );

        $this->M_user->insert_data_user($insert_data_user);
        redirect(base_url('C_auth/crud_usr'));
    }

    public function edit_user($id_user)
    {
        $queryUserDetail = $this->M_user->getDataUserDetail($id_user);
        $data = array('queryUsrDetail' => $queryUserDetail);
        $this->load->view('admin/v_adm_usr', $data);
    }

    public function edit_user_action()
    {
        $this->ajax_checking();

        $postData = $this->input->post();
        $update = $this->t_user->updateDataUserDetail($postData);
        if ($update['status'] == 'success')
            $this->session->set_flashdata('success', 'User ' . $postData['email'] . '`s details have been successfully updated!');

        echo json_encode($update);
    }
    public function delete_user_action($id_user)
    {
        $this->M_user->deleteDataUserDetail($id_user);
        redirect(base_url(''));
    }

    public function crud_menu()
    {

        $data_menu = $this->M_menu->getAllMenu();
        $temp['data'] = $data_menu;
        $this->load->view('admin/v_adm_menu', $temp);
    }

    public function insert_menu_action()
    {
        $nama_menu = $this->input->post('nama_menu');
        $harga_menu = $this->input->post('harga_menu');
        $deskripsi_menu = $this->input->post('deskripsi_menu');
        $foto_menu = $this->input->post('foto_menu');

        $insert_data_menu = array(
            'nama_menu' =>  $nama_menu,
            'harga_menu' =>  $harga_menu,
            'deskripsi_menu' =>  $deskripsi_menu,
            'foto_menu' =>  $foto_menu
        );

        $this->M_menu->insert_data_menu($insert_data_menu);
        redirect(base_url('C_auth/crud_usr'));
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
