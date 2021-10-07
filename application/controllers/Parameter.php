<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Parameter extends CI_Controller
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
      'title' => 'Parameter',
      'parameter' => $this->Admin->get_param(),
      'atribut' => $this->db->get('atribut')->result_array()
    );
    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('Admin/Parameter', $data);
    $this->load->view('templates/Footer', $data);
  }

  public function TambahParameter()
  {
    $data = [
      'id_atribut' => $this->input->post('id_atribut'),
      'nilai' => $this->input->post('nilai'),
      'parameter' => $this->input->post('parameter')
    ];
    $this->db->insert('parameter', $data);
    redirect('Parameter', 'refresh');
  }

  public function Hapus($id_parameter)
  {
    $where = array('id_parameter' => $id_parameter);
    $this->db->delete('parameter', $where);
    redirect('Parameter', 'refresh');
  }

  public function Edit()
  {
    $id_parameter = $this->input->post('id_parameter');
    $id_atribut = $this->input->post('id_atribut');
    $nilai = $this->input->post('nilai');
    $parameter = $this->input->post('parameter');
    $data = [
      'id_atribut' => $id_atribut,
      'nilai' => $nilai,
      'parameter' => $parameter
    ];
    $where = ['id_parameter' => $id_parameter];
    $this->db->where($where);
    $this->db->update('parameter', $data);
    redirect('Parameter', 'refresh');
  }
}
