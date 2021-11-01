<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_Model', 'Auth');
  }
  public function Login()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    $this->form_validation->set_message('valid_email', 'Harus berupa {field}!.');
    $this->form_validation->set_message('required', '{field} harus di isi!.');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Halaman Login';
      $this->load->view('templates/Auth_Header', $data);
      $this->load->view('Auth/Login');
      $this->load->view('templates/Auth_Footer');
    } else {
      $this->ProsesLogin();
    }
  }
  private function ProsesLogin()
  {
    $email = $this->input->post('email');
    $password = md5($this->input->post('password'));
    $data = array(
      'email' => $email,
      'password' => $password
    );
    if ($this->Auth->cek_login($data)->num_rows() > 0) {
      $user = $this->Auth->cek_login($data)->result();
      foreach ($user as $userakun) {
        $userakun = array(
          'idakun' => $userakun->id_user,
          'status' => 'SUKSES',
          'nama' => $userakun->nama,
          'role' => $userakun->role
        );
        $this->session->set_userdata($userakun);

        if ($userakun['role'] == '1') {
          $this->fungsiPeringatan("Selamat Datang");
          redirect('Admin');
        } else if ($userakun['role'] == '2') {
          redirect('User');
        } else {
          echo "hai";
        }
      }
    } else {
      redirect('Auth/ErrorLogin');
    }
  }

  public function ErrorLogin()
  {
    $data['title'] = 'Gagal Login';
    $this->load->view('templates/Auth_Header');
    $this->load->view('Auth/ErrorLogin');
    $this->load->view('templates/Auth_Footer');
  }
  public function Register()
  {
    $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('email', 'email', 'trim|valid_email|required|min_length[4]|is_unique[tb_user.email]');
    $this->form_validation->set_rules('password1', 'password', 'trim|required|min_length[4]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    $this->form_validation->set_message('valid_email', 'Harus berupa {field}!.');
    $this->form_validation->set_message('matches', '{field} tidak sama!.');
    $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
    $this->form_validation->set_message('required', '{field} harus di isi!.');
    $this->form_validation->set_message('is_unique', '{field} ini sudah ada yang punya');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Halaman Registrasi';
      $this->load->view('templates/Auth_Header', $data);
      $this->load->view('Auth/Register');
      $this->load->view('templates/Auth_Footer');
    } else {
      $data = [
        'nama' => $this->input->post('nama'),
        'email' => $this->input->post('email'),
        'password' => md5($this->input->post('password1')),
        'role' => 2,
        'image' => 'pic.jpg',
        'is_active' => 1,
        'date_created' => time()
      ];
      $this->Auth->prosesRegistrasi($data);
      $this->fungsiPeringatan("Your account was active, please Login");
      redirect('Auth/Login', 'refresh');
    }
  }

  public function Logout()
  {
    $this->session->sess_destroy();
    redirect('Home');
  }

  public function fungsiPeringatan($isiPeringatan)
  {
    echo "<script>alert('" . $isiPeringatan . "');</script>";
  }
}
