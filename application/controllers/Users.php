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
        $data['title'] = 'Home';
        $data['get_user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['get_buku'] = $this->db->get('buku')->result_array();

        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/topbar', $data);
        $this->load->view('users/index', $data);
        $this->load->view('template/backend/footer');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['get_user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $this->load->view('template/backend/header', $data);
        $this->load->view('template/backend/sidebar', $data);
        $this->load->view('template/backend/topbar', $data);
        $this->load->view('users/profile', $data);
        $this->load->view('template/backend/footer');
    }

    public function setting_profile($id)
    {
        $data['title'] = 'Profile';
        $data['get_sesi_user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row_array();

        $config = [
            [
                'field' => 'name',
                'label' => 'Nama akun',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
        ];

        $this->form_validation->set_rules($config);

        if (!$this->form_validation->run()) {
            $this->load->view('template/backend/header', $data);
            $this->load->view('template/backend/sidebar', $data);
            $this->load->view('template/backend/topbar', $data);
            $this->load->view('users/profile', $data);
            $this->load->view('template/backend/footer');
        } else {
            $filename = date('Y-m-d') . '_' .  url_title($data['get_sesi_user']['name'], '-', true);
            $config['upload_path']          = FCPATH . '/upload/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $filename;
            $config['overwrite']            = true;
            $config['max_size']             = 2048; // 1MB
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
            }

            $setting_profile = [
                'email' => $this->input->post('email', true),
                'name' => $this->input->post('name', true),
                'image' => $uploaded_data['file_name'],
                'updated_at' => time(),
            ];

            if ($this->db->update('user', $setting_profile, ['id_user' => $id])) {
                $this->session->set_flashdata('message_success', 'Akun kamu berhasil di perbarui.');
                redirect('users/profile');
            }
        }
    }
}
