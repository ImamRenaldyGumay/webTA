<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_Model extends CI_Model
{
  public function getNama()
  {
    $query = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')]);
    return $query;
  }

  public function getProdi()
  {
    $query = "SELECT `tb_prodi`.*, `tb_fakultas`.`nama_fakultas`
    FROM `tb_prodi` JOIN `tb_fakultas`
    ON `tb_prodi`.`fakultas_id` = `tb_fakultas`.`id`";
    return $this->db->query($query)->result_array();
  }

  public function getKriteria()
  {
    $query = "SELECT `tb_kriteria`.*, `tb_beasiswa`.`nama_beasiswa`
    FROM `tb_kriteria` JOIN `tb_beasiswa`
    ON `tb_kriteria`.`kd_beasiswa` = `tb_beasiswa`.`id_beasiswa`";
    return $this->db->query($query)->result_array();
  }

  public function getParameter()
  {
    $query = "SELECT `tb_parameter`.*, `tb_atribut`.`nama_atribut`
    FROM `tb_parameter` JOIN `tb_atribut`
    ON `tb_parameter`.`id_atribut` = `tb_atribut`.`id_atribut`";
    return $this->db->query($query)->result_array();
  }
}
