<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataBeasiswa extends CI_Controller
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
      'title' => 'Data Beasiswa',
      'beasiswa' => $this->db->get('tb_beasiswa')->result_array()
    );

    // $this->form_validation->set_rules('nama_beasiwa', 'Nama Beasiswa', 'required');
    // $this->form_validation->set_rules('nama_prodi', 'Nama Program Studi', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/Header', $data);
      $this->load->view('templates/Navbar', $data);
      $this->load->view('templates/Sidebar', $data);
      $this->load->view('Admin/DataBeasiswa', $data);
      $this->load->view('templates/Footer', $data);
    } else {
      $data = [
        'nama_beasiswa' => $this->input->post('nama_beasiswa'),
        // 'start_date' => $this->input->post('start_date'),
        // 'end_date' => $this->input->post('end_date'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->insert('tb_beasiswa', $data);
      redirect('DataBeasiswa', 'refresh');
    }
  }

  public function Hapus($id)
  {
    $where = array('id' => $id);
    $this->db->delete('tb_beasiswa', $where);
    redirect('DataBeasiswa', 'refresh');
  }

  public function Edit()
  {
    $id_beasiswa = $this->input->post('id_beasiswa');
    $nama_beasiswa = $this->input->post('nama_beasiswa');
    // $start_date = $this->input->post('start_date');
    // $end_date = $this->input->post('end_date');
    $is_active = $this->input->post('is_active');
    $data = [
      'nama_beasiswa' => $nama_beasiswa,
      // 'start_date' => $start_date,
      // 'end_date' => $end_date,
      'is_active' => $is_active
    ];
    $where = ['id_beasiswa' => $id_beasiswa];
    $this->db->where($where);
    $this->db->update('tb_beasiswa', $data);
    redirect('DataBeasiswa', 'refresh');
  }
}
