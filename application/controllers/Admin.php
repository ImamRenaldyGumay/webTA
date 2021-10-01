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
        // $data['user'] = $this->Admin->getNama()->row_array();
        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Halaman Admin'
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/Index', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function regis()
    {
        $this->load->view('regis');
    }
}
