<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_Model extends CI_Model
{
  public function prosesRegistrasi($data)
  {
    $this->db->insert('user', $data);
  }
}
