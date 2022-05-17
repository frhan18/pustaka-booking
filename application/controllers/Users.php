<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id_role') || !$this->session->userdata('id_user')) {
            redirect('auth/index');
        } else if ($this->session->userdata('id_role') == 1) {
            redirect('admin/index');
        }
    }

    public function index()
    {

        $data['title'] = 'Dashboard';
        $data['get_user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();


        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/topbar', $data);
        $this->load->view('users/index', $data);
        $this->load->view('template/backend/footer');
    }
}
