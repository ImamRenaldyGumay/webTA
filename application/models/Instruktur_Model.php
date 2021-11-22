<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Instruktur_Model extends CI_Model
{
  // ==========================================================================================================================
  // Aksi Ambil Nama
  public function getNama()
  {
    $query = $this->db->get_where('tb_user', ['nama' => $this->session->userdata('nama')]);
    return $query;
  }
  // ===========================================================================================================================
  // ===========================================================================================================================
  // Aksi Ambil Data Hitung
  function getDataHitungAkhir()
  {
    $this->db->select('tb_hitungakhir.*, tb_mahasiswa.*, tb_fakultas.*, tb_prodi.*');
    $this->db->from('tb_hitungakhir');
    $this->db->join('tb_mahasiswa', 'tb_hitungakhir.nim_mahasiswa = tb_mahasiswa.nim_mahasiswa');
    $this->db->join('tb_fakultas', 'tb_mahasiswa.id_fakultas = tb_fakultas.id_fakultas');
    $this->db->join('tb_prodi', 'tb_mahasiswa.id_prodi = tb_prodi.id_prodi');
    $hasil = $this->db->get();
    return $hasil->result_array();
  }

  function getHasilAkhir()
  {
    $this->db->select('tb_hitungakhir.*, tb_mahasiswa.*');
  }
  // ===========================================================================================================================
}
