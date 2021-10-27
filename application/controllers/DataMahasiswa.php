<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataMahasiswa extends CI_Controller
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
    $user = $this->Admin->getNama()->row_array();
    $title = 'Data Mahasiswa';
    $mahasiswa = $this->Admin->getMahasiswa();
    $fakultas = $this->Admin->getFakultas();
    $prodi = $this->Admin->ProdiOnMahasiswa();

    $data = array(
      'user' => $user,
      'title' => $title,
      'mahasiswa' => $mahasiswa,
      'fakultas' => $fakultas,
      'prodi' => $prodi
    );
    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('Admin/DataMahasiswa', $data);
    $this->load->view('templates/Footer', $data);
  }
}
