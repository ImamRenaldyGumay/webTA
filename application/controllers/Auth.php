<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function Login()
  {
    $data['title'] = 'Halaman Login';
    $this->load->view('templates/Auth_Header', $data);
    $this->load->view('Auth/Login');
    $this->load->view('templates/Auth_Footer');
  }
  public function Register()
  {
    $data['title'] = 'Halaman Registrasi';

    $this->load->view('templates/Auth_Header', $data);
    $this->load->view('Auth/Register');
    $this->load->view('templates/Auth_Footer');
  }

  public function Logout()
  {
  }
}
