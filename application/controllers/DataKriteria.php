<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataKriteria extends CI_Controller
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
      'title' => 'Data Kriteria',
      'kriteria' => $this->Admin->getKriteria(),
      'beasiswa' => $this->db->get('tb_beasiswa')->result_array()
    );
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/Header', $data);
      $this->load->view('templates/Navbar', $data);
      $this->load->view('templates/Sidebar', $data);
      $this->load->view('Admin/DataKriteria', $data);
      $this->load->view('templates/Footer', $data);
    } else {
      $data = [
        'kd_beasiswa' => $this->input->post('kd_beasiswa'),
        'nama_kriteria' => $this->input->post('nama_kriteria')
      ];
      $this->db->insert('tb_kriteria', $data);
      redirect('DataKriteria', 'refresh');
    }
  }
}
