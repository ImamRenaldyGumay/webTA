<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataMahasiswa extends CI_Controller
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
      'title' => 'Data Mahasiswa',
      'mahasiswa' => $this->Admin->getMahasiswa(),
      'fakultas' => $this->db->get('tb_fakultas')->result_array(),
      'prodi' => $this->db->get('tb_prodi')->result_array()
    );
    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('Admin/DataMahasiswa', $data);
    $this->load->view('templates/Footer', $data);
  }

  public function TambahMahasiswa()
  {
    $this->form_validation->set_rules('nim', 'NIM', 'required');
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('id_fakultas', 'Fakultas', 'required');
    $this->form_validation->set_rules('id_prodi', 'Programa Studi', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');

    $this->form_validation->set_message('required', 'Form {field} harus di isi!.');

    $data = [
      'nim' => $this->input->post('nim'),
      'nama' => $this->input->post('nama'),
      'id_fakultas' => $this->input->post('id_fakultas'),
      'id_prodi' => $this->input->post('id_prodi'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin')
    ];
    $this->db->insert('tb_mahasiswa', $data);
    redirect('DataMahasiswa', 'refresh');
  }

  public function Hapus($id_mahasiswa)
  {
    $where = array('id_mahasiswa' => $id_mahasiswa);
    $this->db->delete('tb_mahasiswa', $where);
    redirect('DataMahasiswa', 'refresh');
  }

  public function Edit()
  {
    $this->form_validation->set_rules('nim', 'NIM', 'required');
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('id_fakultas', 'Fakultas', 'required');
    $this->form_validation->set_rules('id_prodi', 'Programa Studi', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');

    $this->form_validation->set_message('required', 'Form {field} harus di isi!.');

    $id_mahasiswa = $this->input->post('id_mahasiswa');
    $nim = $this->input->post('nim');
    $nama = $this->input->post('nama');
    $id_fakultas = $this->input->post('id_fakultas');
    $id_prodi = $this->input->post('id_prodi');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $data = [
      'nim' => $nim,
      'nama' => $nama,
      'id_fakultas' => $id_fakultas,
      'id_prodi' => $id_prodi,
      'jenis_kelamin' => $jenis_kelamin,
    ];
    $where = ['id_mahasiswa' => $id_mahasiswa];
    $this->db->where($where);
    $this->db->update('tb_mahasiswa', $data);
    redirect('DataMahasiswa', 'refresh');
  }
}
