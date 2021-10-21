<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataParameter extends CI_Controller
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
      'title' => 'Data Parameter',
      'parameter' => $this->Admin->getParameter(),
      'kriteria' => $this->db->get('tb_kriteria')->result_array(),
      'beasiswa' => $this->db->get('tb_beasiswa')->result_array()
    );
    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('Admin/DataParameter', $data);
    $this->load->view('templates/Footer', $data);
  }

  public function TambahDataParameter()
  {
    $this->form_validation->set_rules('id_beasiswa', 'Nama Beasiswa', 'required');
    $this->form_validation->set_rules('id_kriteria', 'Nama Kriteria', 'required');
    $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
    $this->form_validation->set_rules('bobot', 'bobot', 'required');

    $this->form_validation->set_message('required', '{field} harus di isi!.');
    $data = [
      'id_beasiswa' => $this->input->post('id_beasiswa'),
      'id_kriteria' => $this->input->post('id_kriteria'),
      'keterangan' => $this->input->post('keterangan'),
      'bobot' => $this->input->post('bobot'),
    ];
    $this->db->insert('tb_parameter', $data);
    redirect('DataParameter', 'refresh');
  }

  public function Hapus($id_parameter)
  {
    $where = array('id_parameter' => $id_parameter);
    $this->db->delete('tb_parameter', $where);
    redirect('DataParameter', 'refresh');
  }

  public function Edit()
  {
    $id_parameter = $this->input->post('id_parameter');
    $keterangan = $this->input->post('keterangan');
    $bobot = $this->input->post('bobot');
    $data = [
      'keterangan' => $keterangan,
      'bobot' => $bobot
    ];
    $where = ['id_parameter' => $id_parameter];
    $this->db->where($where);
    $this->db->update('tb_parameter', $data);
    redirect('DataParameter', 'refresh');
  }
}
