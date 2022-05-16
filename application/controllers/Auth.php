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
    $data['title'] = 'Login';
    $this->load->view('template/frontend/header', $data);
    $this->load->view('auth/login');
    $this->load->view('template/frontend/footer');
  }
}
