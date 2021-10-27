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
      $this->load->model('User_Model', 'User');
    }
  }
  public function index()
  {
    $data = array(
      'user' =>  $this->db->get_where('tb_user', ['nama' => $this->session->userdata('nama')])->row_array(),
      'title' => 'User'
    );
    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('User/Index', $data);
    $this->load->view('templates/Footer', $data);
  }
}
