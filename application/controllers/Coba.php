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
    $ProbLayak = $this->Admin->ProbLayak();
    $ProbTidakLayak = $this->Admin->ProbTidaLayak();
    $totalProb = $this->Admin->ProbLayak() + $this->Admin->ProbTidaLayak();
    $getJumlahIPK1 = $this->Admin->getJumlahIPK1();
    $pIPK1Layak = $this->Admin->getJumlahIPK1() / $this->Admin->countLayak();
    $IPK1Tidak = $this->Admin->getJumlahIPK1() / $this->Admin->countTidakLayak();
    $IPK2 = $this->Admin->getJumlahIPK2();
    $IPK2Tidak = $this->Admin->getJumlahIPK2() / $this->Admin->countTidakLayak();
    $IPK2Layak = $this->Admin->getJumlahIPK2() / $this->Admin->countLayak();
    $IPK3 = $this->Admin->getJumlahIPK3();
    $IPK3Tidak = $this->Admin->getJumlahIPK3() / $this->Admin->countTidakLayak();
    $IPK3Layak = $this->Admin->getJumlahIPK3() / $this->Admin->countLayak();
    $kerja1 = $this->Admin->getJumlahPekerjaan1();
    $kerja2 = $this->Admin->getJumlahPekerjaan2();
    $kerja3 = $this->Admin->getJumlahPekerjaan3();
    $gaji1 = $this->Admin->getJumlahGaji1();
    $gaji2 = $this->Admin->getJumlahGaji2();
    $gaji3 = $this->Admin->getJumlahGaji3();
    $gaji4 = $this->Admin->getJumlahGaji4();
    $tanggung1 = $this->Admin->getJumlahTanggung1();
    $tanggung2 = $this->Admin->getJumlahTanggung2();
    $tanggung3 = $this->Admin->getJumlahTanggung3();

    $status_ipk = array();


    $data = array(
      'user' => $user,
      'title' => $title,
      'jumlahLayak' => $jumlahLayak,
      'jumlahTidakLayak' => $jumlahTidakLayak,
      'totalData' => $totalData,
      'probLayak' => $ProbLayak,
      'probTidakLayak' => $ProbTidakLayak,
      'totalProb' => $totalProb,
      'IPK1' => $getJumlahIPK1,
      'IPK1Tidak' => $IPK1Tidak,
      'IPK1Layak' => $pIPK1Layak,
      'IPK2' => $IPK2,
      'IPK2Tidak' => $IPK2Tidak,
      'IPK2Layak' => $IPK2Layak,
      'IPK3' => $IPK3,
      'IPK3Tidak' => $IPK3Tidak,
      'IPK3Layak' => $IPK3Layak,
      'kerja1' => $kerja1,
      'kerja2' => $kerja2,
      'kerja3' => $kerja3,
      'gaji1' => $gaji1,
      'gaji2' => $gaji2,
      'gaji3' => $gaji3,
      'gaji4' => $gaji4,
      'tanggung1' => $tanggung1,
      'tanggung2' => $tanggung2,
      'tanggung3' => $tanggung3
    );

    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('Coba/Coba', $data);
    $this->load->view('templates/Footer', $data);
  }
}
