<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('id_role') || !$this->session->userdata('id_user')) {
      redirect('/auth/index');
    }
  }


  public function index()
  {
    $data['title'] = 'Dashboard';
    // $this->load->view('template/frontend/header', $data);
    $this->load->view('template/backend/index');
    // $this->load->view('template/frontend/footer');
  }
}
