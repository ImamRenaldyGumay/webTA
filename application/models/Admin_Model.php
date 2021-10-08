<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_Model extends CI_Model
{
  public function getNama()
  {
    $query = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')]);
    return $query;
  }
  public function getBeasiswa()
  {
    $query = $this->db->get('beasiswa')->result_array();
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
    $query = "SELECT `tb_parameter`.*, `tb_beasiswa`.`nama_beasiswa`, `tb_kriteria`.`nama_kriteria`
    FROM `tb_kriteria` 
    JOIN `tb_parameter`
    ON `tb_parameter`.`id_kriteria` = `tb_kriteria`.`id_kriteria`
    JOIN `tb_beasiswa`
    ON `tb_parameter`.`id_beasiswa` = `tb_beasiswa`.`id_beasiswa`
    ";
    return $this->db->query($query)->result_array();
  }

  public function getMahasiswa()
  {
    $query = "SELECT `tb_mahasiswa`.*, `tb_fakultas`.`nama_fakultas`, `tb_prodi`.`nama_prodi`
    FROM `tb_prodi` 
    JOIN `tb_mahasiswa`
    ON `tb_mahasiswa`.`id_prodi` = `tb_prodi`.`id`
    JOIN `tb_fakultas`
    ON `tb_mahasiswa`.`id_fakultas` = `tb_fakultas`.`id`
    ";
    return $this->db->query($query)->result_array();
  }

  public function getLatih()
  {
    $query = "SELECT `tb_latih`.*, `beasiswa`.`nama_beasiswa`, `tb_kriteria`.`nama_kriteria`, `tb_parameter`.`nilai`,  `tb_mahasiswa`.`nama`
    FROM `tb_parameter` 
    JOIN `tb_latih`
    ON `tb_latih`.`id_parameter` = `tb_parameter`.`id_parameter`
    JOIN `tb_kriteria`
    ON `tb_latih`.`id_kriteria` = `tb_kriteria`.`id_kriteria`
    JOIN `beasiswa`
    ON `tb_latih`.`id_beasiswa` = `beasiswa`.`id`
    JOIN `tb_mahasiswa`
    ON `tb_latih`.`id_mahasiswa` = `tb_mahasiswa`.`id_mahasiswa`
    ";
    return $this->db->query($query)->result_array();
  }

  public function get_param()
  {
    $query = "SELECT `parameter`.*, `atribut`.`nama_atribut`
    FROM `parameter` JOIN `atribut`
    ON `parameter`.`id_atribut` = `atribut`.`id_atribut`";
    return $this->db->query($query)->result_array();
  }

  public function getLat()
  {
    $query = "SELECT `latih`.*, `parameter`.`parameter`, `tb_mahasiswa`.`nama`
    FROM `latih` 
    JOIN `parameter`
    ON `latih`.`c1` = `parameter`.`nilai`
    
    JOIN `tb_mahasiswa`
    ON `latih`.`id_mahasiswa` = `tb_mahasiswa`.`id_mahasiswa`
    ";
    return $this->db->query($query)->result_array();
  }

  public function getC1()
  {
    $this->db->select('*');
    $this->db->from('tb_parameter');
    $this->db->where('id_kriteria', '1');
    return $this->db->get()->result_array();
  }

  public function getC2()
  {
    $this->db->select('*');
    $this->db->from('tb_parameter');
    $this->db->where('id_kriteria', '3');
    return $this->db->get()->result_array();
  }

  public function getC3()
  {
    $this->db->select('*');
    $this->db->from('tb_parameter');
    $this->db->where('id_kriteria', '7');
    return $this->db->get()->result_array();
  }

  public function getC4()
  {
    $this->db->select('*');
    $this->db->from('tb_parameter');
    $this->db->where('id_kriteria', '8');
    return $this->db->get()->result_array();
  }
}
