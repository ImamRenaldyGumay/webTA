<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataFakultas extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('idakun') == '' or $this->session->userdata('role') != '1' or $this->session->userdata('status') == '') {
      $this->session->sess_destroy();
      redirect('Home', 'refresh');
    }
  }

  public function index()
  {
    $data = array(
      'user' => $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array(),
      'title' => 'Data Fakultas',
      'fakultas' => $this->db->get('tb_fakultas')->result_array()
    );

    $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/Header', $data);
      $this->load->view('templates/Navbar', $data);
      $this->load->view('templates/Sidebar', $data);
      $this->load->view('Admin/DataFakultas', $data);
      $this->load->view('templates/Footer', $data);
    } else {
      $this->db->insert('tb_fakultas', ['nama_fakultas' => $this->input->post('nama_fakultas')]);
      redirect('DataFakultas', 'refresh');
    }
  }

  public function Hapus($id)
  {
    $where = array('id' => $id);
    $this->db->delete('tb_fakultas', $where);
    redirect('DataFakultas', 'refresh');
  }

  public function Edit()
  {
    $id = $this->input->post('id');
    $nama_fakultas = $this->input->post('nama_fakultas');
    $data = ['nama_fakultas' => $nama_fakultas];
    $where = ['id' => $id];
    $this->db->where($where);
    $this->db->update('tb_fakultas', $data);
    redirect('DataFakultas', 'refresh');
  }
}
