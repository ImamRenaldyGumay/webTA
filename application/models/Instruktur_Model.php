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
    // $this->db->where('hasil_akhir', 'Layak');
    $this->db->from('tb_hitungakhir');
    $this->db->join('tb_mahasiswa', 'tb_hitungakhir.nim_mahasiswa = tb_mahasiswa.nim_mahasiswa');
    $this->db->join('tb_fakultas', 'tb_mahasiswa.id_fakultas = tb_fakultas.id_fakultas');
    $this->db->join('tb_prodi', 'tb_mahasiswa.id_prodi = tb_prodi.id_prodi');
    $hasil = $this->db->get();
    return $hasil->result_array();
  }

  function getHitungAkhir1()
  {
    $this->db->select('tb_hitungakhir.*, tb_mahasiswa.*, tb_fakultas.*, tb_prodi.*');
    $this->db->where('hasil_akhir', 'Layak');
    $this->db->from('tb_hitungakhir');
    $this->db->join('tb_mahasiswa', 'tb_hitungakhir.nim_mahasiswa = tb_mahasiswa.nim_mahasiswa');
    $this->db->join('tb_fakultas', 'tb_mahasiswa.id_fakultas = tb_fakultas.id_fakultas');
    $this->db->join('tb_prodi', 'tb_mahasiswa.id_prodi = tb_prodi.id_prodi');
    $hasil = $this->db->get();
    return $hasil->result_array();
  }

  function detailHitungAkhir($id_hitungakhir)
  {
    $query = $this->db->get_where('tb_hitungakhir', ['id_hitungakhir' => $id_hitungakhir]);
    return $query->row_array();
  }

  function status_ipk($status)
  {
    // Status Layak
    $this->db->where('c1', $status);
    $this->db->where('hasil', 'Layak');
    $this->db->from('tb_latih');
    $layak = $this->db->count_all_results() / $this->countLayak();
    // Status Tidak Layak
    $this->db->where('c1', $status);
    $this->db->where('hasil', 'Tidak Layak');
    $this->db->from('tb_latih');
    $tidak = $this->db->count_all_results() / $this->countTidakLayak();
    return array('Layak' => $layak, 'Tidak Layak' => $tidak);
  }

  function status_pekerjaan($status)
  {
    // Status Layak
    $this->db->where('c2', $status);
    $this->db->where('hasil', 'Layak');
    $this->db->from('tb_latih');
    $layak = $this->db->count_all_results() / $this->countLayak();
    // Status Tidak Layak
    $this->db->where('c2', $status);
    $this->db->where('hasil', 'Tidak Layak');
    $this->db->from('tb_latih');
    $tidak = $this->db->count_all_results() / $this->countTidakLayak();
    return array('Layak' => $layak, 'Tidak Layak' => $tidak);
  }

  function status_gaji($status)
  {
    // Status Layak
    $this->db->where('c3', $status);
    $this->db->where('hasil', 'Layak');
    $this->db->from('tb_latih');
    $layak = $this->db->count_all_results() / $this->countLayak();
    // Status Tidak Layak
    $this->db->where('c3', $status);
    $this->db->where('hasil', 'Tidak Layak');
    $this->db->from('tb_latih');
    $tidak = $this->db->count_all_results() / $this->countTidakLayak();
    return array('Layak' => $layak, 'Tidak Layak' => $tidak);
  }

  function status_tanggungan($status)
  {
    // Status Layak
    $this->db->where('c3', $status);
    $this->db->where('hasil', 'Layak');
    $this->db->from('tb_latih');
    $layak = $this->db->count_all_results() / $this->countLayak();
    // Status Tidak Layak
    $this->db->where('c3', $status);
    $this->db->where('hasil', 'Tidak Layak');
    $this->db->from('tb_latih');
    $tidak = $this->db->count_all_results() / $this->countTidakLayak();
    return array('Layak' => $layak, 'Tidak Layak' => $tidak);
  }

  public function countTotalDataLatih()
  {
    $this->db->from('tb_latih');
    return $this->db->count_all_results();
  }

  public function countTidakLayak()
  {
    $this->db->where('hasil', 'Tidak Layak');
    $this->db->from('tb_latih');
    return $this->db->count_all_results();
  }

  public function countLayak()
  {
    $this->db->where('hasil', 'Layak');
    $this->db->from('tb_latih');
    return $this->db->count_all_results();
  }

  // Listing
  public function listing()
  {
    $this->db->select('tb_hitungakhir.*, tb_mahasiswa.*, tb_fakultas.*, tb_prodi.*');
    $this->db->where('hasil_akhir', 'Layak');
    $this->db->from('tb_hitungakhir');
    $this->db->join('tb_mahasiswa', 'tb_hitungakhir.nim_mahasiswa = tb_mahasiswa.nim_mahasiswa');
    $this->db->join('tb_fakultas', 'tb_mahasiswa.id_fakultas = tb_fakultas.id_fakultas');
    $this->db->join('tb_prodi', 'tb_mahasiswa.id_prodi = tb_prodi.id_prodi');
    $query = $this->db->get();
    return $query->result();
  }

  function getHasilAkhir()
  {
    $this->db->select('tb_hitungakhir.*, tb_mahasiswa.*');
  }
  // ===========================================================================================================================
}
