<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Atribut extends CI_Controller
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
      'title' => 'Data Atribut',
      'atribut' => $this->db->get('atribut')->result_array()
    );

    $this->form_validation->set_rules('nama_atribut', 'Nama Atribut', 'required');

    $this->form_validation->set_message('required', '{field} harus di isi!.');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/Header', $data);
      $this->load->view('templates/Navbar', $data);
      $this->load->view('templates/Sidebar', $data);
      $this->load->view('Admin/Atribut', $data);
      $this->load->view('templates/Footer', $data);
    } else {
      $this->db->insert('Atribut', ['nama_atribut' => $this->input->post('nama_atribut')]);
      redirect('Atribut', 'refresh');
    }
  }

  public function Hapus($id_atribut)
  {
    $where = array('id_atribut' => $id_atribut);
    $this->db->delete('Atribut', $where);
    redirect('Atribut', 'refresh');
  }

  public function Edit()
  {
    $id_atribut = $this->input->post('id_atribut');
    $nama_atribut = $this->input->post('nama_atribut');
    $data = ['nama_atribut' => $nama_atribut];
    $where = ['id_atribut' => $id_atribut];
    $this->db->where($where);
    $this->db->update('Atribut', $data);
    redirect('Atribut', 'refresh');
  }
}
