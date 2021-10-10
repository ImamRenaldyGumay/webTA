<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataProdi extends CI_Controller
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
      'title' => 'Data Prodi',
      'prodi' => $this->Admin->getProdi(),
      'fakultas' => $this->db->get('tb_fakultas')->result_array()
    );

    $this->form_validation->set_rules('fakultas_id', 'Nama Fakultas', 'required');
    $this->form_validation->set_rules('nama_prodi', 'Nama Program Studi', 'required');

    $this->form_validation->set_message('required', '{field} harus di isi!.');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/Header', $data);
      $this->load->view('templates/Navbar', $data);
      $this->load->view('templates/Sidebar', $data);
      $this->load->view('Admin/DataProdi', $data);
      $this->load->view('templates/Footer', $data);
    } else {
      $data = [
        'id_fakultas' => $this->input->post('id_fakultas'),
        'nama_prodi' => $this->input->post('nama_prodi')
      ];
      $this->db->insert('tb_prodi', $data);
      redirect('DataProdi', 'refresh');
    }
  }

  public function Hapus($id_prodi)
  {
    $where = array('id_prodi' => $id_prodi);
    $this->db->delete('tb_prodi', $where);
    redirect('DataProdi', 'refresh');
  }

  public function Edit()
  {
    $id_prodi = $this->input->post('id_prodi');
    $nama_prodi = $this->input->post('nama_prodi');
    $data = [
      'nama_prodi' => $nama_prodi
    ];
    $where = ['id_prodi' => $id_prodi];
    $this->db->where($where);
    $this->db->update('tb_prodi', $data);
    redirect('DataProdi', 'refresh');
  }
}
