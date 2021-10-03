<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
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
            'title' => 'Admin'
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/Index', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function DataBeasiswa()
    {
        $data = array(
            'user' => $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array(),
            'title' => 'Daftar Beasiswa',
            'beasiswa' => $this->db->get('tb_beasiswa')->result_array()
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Header', $data);
            $this->load->view('templates/Navbar', $data);
            $this->load->view('templates/Sidebar');
            $this->load->view('Admin/DaftarBeasiswa', $data);
            $this->load->view('templates/Footer');
        } else {
            $this->db->insert('tb_beasiswa', ['nama_beasiswa' => $this->input->post('nama_beasiswa')]);
            redirect('DataBeasiswa', 'refresh');
        }
    }
}
