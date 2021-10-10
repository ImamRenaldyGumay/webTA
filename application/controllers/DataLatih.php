<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataLatih extends CI_Controller
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
      'user' => $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array(),
      'title' => 'Data Latih',
      'latih' => $this->Admin->getLatih(),
      'mahasiswa' => $this->db->get('tb_mahasiswa')->result_array(),
      'beasiswa' => $this->Admin->getBeasiswa(),
      'c1' => $this->Admin->getC1(),
      'c2' => $this->Admin->getC2(),
      'c3' => $this->Admin->getC3(),
      'c4' => $this->Admin->getC4(),
    );
    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('Admin/Datalatih', $data);
    $this->load->view('templates/Footer', $data);
  }

  public function TambahLatih()
  {
    $data = [
      'id_mahasiswa' => $this->input->post('id_mahasiswa'),
      'id_beasiswa' => $this->input->post('id_beasiswa'),
      'c1' => $this->input->post('c1'),
      'c2' => $this->input->post('c2'),
      'c3' => $this->input->post('c3'),
      'c4' => $this->input->post('c4'),
    ];
    $this->db->insert('tb_latih', $data);
    redirect('DataLatih', 'refresh');
  }

  public function Hapus($id_latih)
  {
    $where = array('id_latih' => $id_latih);
    $this->db->delete('tb_latih', $where);
    redirect('DataLatih', 'refresh');
  }
}
