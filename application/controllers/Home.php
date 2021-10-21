<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function index()
  {
    $data = [
      'title' => 'Halaman Awal'
    ];
    $this->load->view('Home/Index', $data);
  }

  public function Baru()
  {
    $this->load->view('Home/Baru');
  }

  public function cek()
  {
    $user = $this->input->post('user');
    if ($user == 'admin') {
      $this->fungsiPeringatan("berhasil");
      redirect('Home/index');
    } else {
      $this->fungsiPeringatan('tidak');
      redirect('Home/baru');
    }
  }

  public function fungsiPeringatan($isiPeringatan)
  {
    echo "<script>alert('" . $isiPeringatan . "');</script>";
  }
}
