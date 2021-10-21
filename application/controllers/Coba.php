<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Coba extends CI_Controller
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
    $title = 'Coba';
    $jumlahLayak = $this->Admin->countLayak();
    $jumlahTidakLayak = $this->Admin->countTidakLayak();
    $totalData = $this->Admin->countTotalDataLatih();


    $data = array(
      'user' => $user,
      'title' => $title,
      'jumlahLayak' => $jumlahLayak,
      'jumlahTidakLayak' => $jumlahTidakLayak,
      'totalData' => $totalData
    );

    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('Coba/Coba', $data);
    $this->load->view('templates/Footer', $data);
  }
}
