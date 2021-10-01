<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('idakun') == '' or $this->session->userdata('role') != '2' or $this->session->userdata('status') == '') {
      $this->session->sess_destroy();
      redirect('Home', 'refresh');
    } else {
      // $this->load->model('User_Model', 'User');
    }
  }
  public function index()
  {
    $this->load->view('User/Index');
  }
}
