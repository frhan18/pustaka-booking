<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }


  public function index()
  {
    $data['title'] = 'Dashboard';
    // $this->load->view('template/frontend/header', $data);
    $this->load->view('template/backend/index');
    // $this->load->view('template/frontend/footer');
  }
}
