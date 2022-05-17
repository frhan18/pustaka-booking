<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('id_role') || !$this->session->userdata('id_user')) {
      redirect('/auth/index');
    } else if ($this->session->userdata('id_role') == 2) {
      redirect('users/index');
    }
  }


  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['get_user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $data['count_user'] = $this->db->count_all('user');
    $data['count_book'] = $this->db->count_all('buku', ['stok' != 0]);
    $data['count_book_dipinjam'] = $this->db->count_all('buku', ['dipinjam' != 0]);
    $data['count_book_dibooking'] = $this->db->count_all('buku', ['dibooking' != 0]);
    $data['user'] = $this->db->select('*')
      ->from('user')
      ->join('user_role', 'user_role.id_role=user.id_role')
      ->get()->result_array();

    $this->load->view('template/backend/header', $data);
    $this->load->view('template/backend/sidebar', $data);
    $this->load->view('template/backend/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('template/backend/footer');
  }


  public function delete_user($id)
  {
    if (!$id) {
      show_404();
    }

    $this->db->delete('user', ['id_user' => $id]);
    $this->session->set_flashdata('message_success', 'Data anggota berhasil di hapus');
    redirect('admin/index');
  }




  public function anggota()
  {

    $data['title'] = 'Anggota';
    $data['get_user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $data['user'] = $this->db->select('*')
      ->from('user')
      ->join('user_role', 'user_role.id_role=user.id_role')
      ->get()->result_array();
    $this->load->view('template/backend/header', $data);
    $this->load->view('template/backend/sidebar', $data);
    $this->load->view('template/backend/topbar', $data);
    $this->load->view('admin/list_anggota', $data);
    $this->load->view('template/backend/footer');
  }

  public function insert_anggota()
  {

    $this->form_validation->set_rules('name', 'Nama', 'required|trim', [
      'required' => '{field} tidak boleh kosong',

    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'required' => '{field} tidak boleh kosong',
      'valid_email' => 'Alamat {field} salah!',
      'is_unique' => '{field} sudah terdaftar'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim', [
      'required' => '{field} tidak boleh kosong',
    ]);

    if (!$this->form_validation->run()) {
      $data['title'] = 'Anggota';
      $data['get_user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
      $data['user'] = $this->db->select('*')
        ->from('user')
        ->join('user_role', 'user_role.id_role=user.id_role')
        ->get()->result_array();
      $this->load->view('template/backend/header', $data);
      $this->load->view('template/backend/sidebar', $data);
      $this->load->view('template/backend/topbar', $data);
      $this->load->view('admin/list_anggota', $data);
      $this->load->view('template/backend/footer');
    } else {
      $data = [
        'id_user'      => str_replace('.', '', uniqid('', true)),
        'email'        => htmlspecialchars($this->input->post('email', true)),
        'name'         => htmlspecialchars($this->input->post('name', true)),
        'password'     => htmlspecialchars(password_hash($this->input->post('password', true), PASSWORD_DEFAULT)),
        'id_role'      => htmlspecialchars($this->input->post('id_role', true)),
        'is_active'    => htmlspecialchars($this->input->post('is_active', true)),
        'image'        => 'default.svg',
        'created_at'   => time()
      ];

      if ($this->db->insert('user', $data)) {
        $this->session->set_flashdata('message_success', 'Data anggota berhasil di tambahkan');
        redirect('admin/anggota');
      }
    }
  }

  public function update_anggote()
  {
    $id = $this->input->post('id_user', true);
    $data = [
      'email'        => htmlspecialchars($this->input->post('email', true)),
      'name'         => htmlspecialchars($this->input->post('name', true)),
      'id_role'      => htmlspecialchars($this->input->post('id_role', true)),
      'is_active'    => htmlspecialchars($this->input->post('is_active', true)),
      'updated_at'   => time()
    ];

    if ($this->db->update('user', $data, ['id_user' => $id])) {
      $this->session->set_flashdata('message_success', 'Data anggota berhasil di update');
      redirect('admin/anggota');
    }
  }

  public function delete_anggota($id)
  {
    if (!$id) {
      show_404();
    }

    $this->db->delete('user', ['id_user' => $id]);
    $this->session->set_flashdata('message_success', 'Data anggota berhasil di hapus');
    redirect('admin/anggota');
  }
}
