<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }


  public function index()
  {

    if ($this->session->userdata('id_user')) {
      redirect('users/index');
    }

    $this->form_validation->set_rules('password', 'Password', 'required|trim', [
      'required' => '{field} tidak boleh kosong!'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
      'required' => '{field} tidak boleh kosong!',
      'valid_email' => 'Alamat {field} tidak benar!',
    ]);

    if (!$this->form_validation->run()) {
      $data['title'] = 'Login';
      $this->load->view('template/frontend/header', $data);
      $this->load->view('auth/login');
      $this->load->view('template/frontend/footer');
    } else {
      $this->_login();
    }
  }


  public function register()
  {
    $this->form_validation->set_rules('name', 'Nama', 'required|trim', [
      'required' => '{field} tidak boleh kosong!'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'required' => '{field} tidak boleh kosong!',
      'valid_email' => 'Alamat {field} tidak benar!',
      'is_unique' => 'Alamat {field} sudah terdaftar'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim', [
      'required' => '{field} tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
      'matches' => '{field} tidak sama dengan password utama',
      'required' => '{field} tidak boleh kosong!',
    ]);


    if (!$this->form_validation->run()) {
      $data['title'] = 'Register Account';
      $this->load->view('template/frontend/header', $data);
      $this->load->view('auth/register');
      $this->load->view('template/frontend/footer');
    } else {
      $data = [
        'id_user'      => str_replace('.', '', uniqid('', true)),
        'name'         => htmlspecialchars($this->input->post('name', true)),
        'email'        => htmlspecialchars($this->input->post('email', true)),
        'password'     => htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)),
        'image'        => 'default.svg',
        'id_role'      => 2,
        'is_active'    => 1,
        'created_at'   => time()
      ];

      if ($this->db->insert('user', $data)) {
        $this->session->set_flashdata('message_success', 'Akun berhasil dibuat, Silahkan login');
        redirect('auth/index');
      }
    }
  }


  private function _login()
  {
    $email = htmlspecialchars($this->input->post('email', true));
    $password = htmlspecialchars($this->input->post('password', true));
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      // Account active > 1 ?
      if ($user['is_active'] == 1) {
        // passwordinput == password tabel user ?
        if (password_verify($password, $user['password'])) {
          // Set session user 
          $new_session = [
            'id_user' => $user['id_user'],
            'id_role' => $user['id_role']
          ];
          if ($new_session) {
            $this->session->set_userdata($new_session);
          }

          if ($user['id_role'] == 1) { // role admin
            redirect('/admin/index');
          } else { // role users
            redirect('/users/index');
          }
        } else {
          $this->session->set_flashdata('message_error', 'Password salah!');
          redirect('auth/index');
        }
      } else {
        $this->session->set_flashdata('message_error', 'Akun tidak aktif! mohon untuk memverifikasi telebih dahulu');
        redirect('auth/index');
      }
    } else {
      $this->session->set_flashdata('message_error', 'Alamat email tidak terdaftar!');
      redirect('auth/index');
    }
  }



  public function logout()
  {
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('id_role');

    $this->session->set_flashdata('message_success', 'Akun berhasil di keluarkan');
    redirect('/auth/index');
  }
}
