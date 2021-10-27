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
      'user' => $this->db->get_where('tb_user', ['nama' => $this->session->userdata('nama')])->row_array(),
      'title' => 'Data Kriteria',
      'kriteria' => $this->Admin->getKriteria(),
      'beasiswa' => $this->db->get('tb_beasiswa')->result_array()
    );
    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('Admin/DataKriteria', $data);
    $this->load->view('templates/Footer', $data);
  }
  public function TambahDataKriteria()
  {
    $this->form_validation->set_rules('id_beasiswa', 'Nama Beasiswa', 'required');
    $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required');

    $this->form_validation->set_message('required', '{field} harus di isi!.');
    $data = [
      'id_beasiswa' => $this->input->post('id_beasiswa'),
      'nama_kriteria' => $this->input->post('nama_kriteria')
    ];
    $this->db->insert('tb_kriteria', $data);
    redirect('DataKriteria', 'refresh');
  }

  public function Hapus($id_kriteria)
  {
    $where = array('id_kriteria' => $id_kriteria);
    $this->db->delete('tb_kriteria', $where);
    redirect('DataKriteria', 'refresh');
  }

  public function Edit()
  {
    $data = ['nama_kriteria' => $this->input->post('nama_kriteria')];
    $where = ['id_kriteria' => $this->input->post('id_kriteria')];
    $this->db->where($where);
    $this->db->update('tb_kriteria', $data);
    redirect('DataKriteria', 'refresh');
  }
}
