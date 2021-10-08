<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Latih extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('idakun') == '' or $this->session->userdata('role') != '1' or $this->session->userdata('status') == '') {
      $this->session->sess_destroy();
      redirect('Home', 'refresh');
    } else {
      $this->load->model('Admin_Model', 'Admin');
    }
  }

  public function index()
  {
    $data = array(
      'user' => $this->Admin->getNama()->row_array(),
      'title' => 'Latih',
      'latih' => $this->db->get('latih')->result_array(),
      'mahasiswa' => $this->db->get('tb_mahasiswa')->result_array(),
      'atribut' => $this->db->get('atribut')->result_array()
    );
    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('Admin/Latih', $data);
    $this->load->view('templates/Footer', $data);
  }
}
