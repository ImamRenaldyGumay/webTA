<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_Model extends CI_Model
{
  // ==========================================================================================================================
  // Aksi Ambil Nama
  public function getNama()
  {
    $query = $this->db->get_where('tb_user', ['nama' => $this->session->userdata('nama')]);
    return $query;
  }
  // ==========================================================================================================================

  // ===========================================================================================================================
  // Aksi Data Fakultas
  public function getFakultas()
  {
    $query = $this->db->get('tb_fakultas');
    return $query->result_array();
  }

  public function TambahFakultas($data)
  {
    $query = $this->db->insert('tb_fakultas', $data);
    return $query;
  }

  public function HapusDataFakultas($id_fakultas)
  {
    $where = array('id_fakultas' => $id_fakultas);
    $query =  $this->db->delete('tb_fakultas', $where);
    return $query;
  }

  public function detail_dataFakultas($id_fakultas)
  {
    $query = $this->db->get_where('tb_fakultas', ['id_fakultas' => $id_fakultas]);
    return $query->row_array();
  }

  public function EditDataFakultas()
  {
    $id_fakultas = $this->input->post('id_fakultas');
    $nama_fakultas = $this->input->post('nama_fakultas');
    $data = ['nama_fakultas' => $nama_fakultas];
    $this->db->where('id_fakultas', $id_fakultas);
    $query = $this->db->update('tb_fakultas', $data);
    return $query;
  }
  // ==============================================================================================================

  // ==============================================================================================================
  // Aksi Data Prodi
  public function getProdi()
  {
    $this->db->select('tb_prodi.*, tb_fakultas.nama_fakultas');
    $this->db->from('tb_prodi');
    $this->db->join('tb_fakultas', 'tb_prodi.id_fakultas = tb_fakultas.id_fakultas');
    $hasil = $this->db->get();
    return $hasil->result_array();
  }

  public function TambahDataProdi()
  {
    $id_fakultas = $this->input->post('id_fakultas');
    $nama_prodi = $this->input->post('nama_prodi');
    $data = [
      'id_fakultas' => $id_fakultas,
      'nama_prodi' => $nama_prodi
    ];
    $tambahProdi =  $this->db->insert('tb_prodi', $data);
    return $tambahProdi;
  }

  function getIdFakultas($where, $table)
  {
    return $this->db->get_where($table, $where)->result_array();
  }

  public function getKriteria()
  {
    $hasil = $this->db->get('tb_kriteria');
    return $hasil->result_array();
  }

  public function tambahKriteria($data)
  {
    $hasil = $this->db->insert('tb_kriteria', $data);
    return $hasil;
  }

  public function hapusKriteria()
  {
    # code...
  }

  public function detail_dataKriteria($id_kriteria)
  {
    $query = $this->db->get_where('tb_kriteria', ['id_kriteria' => $id_kriteria]);
    return $query->row_array();
  }

  public function getParameter()
  {
    $this->db->select('tb_parameter.* , tb_kriteria.nama_kriteria');
    $this->db->from('tb_parameter');
    $this->db->join('tb_kriteria', 'tb_parameter.id_kriteria = tb_kriteria.id_kriteria');
    $query = $this->db->get();
    return $query->result_array();
  }
  // =======================================================================================
  // Aksi DataLatih
  public function getLatih()
  {
    $this->db->select('tb_latih.* , tb_ipk.* , tb_pekerjaan.*, tb_gaji.*, tb_tanggungan.*');
    $this->db->from('tb_latih');
    $this->db->join('tb_ipk', 'tb_latih.c1 = tb_ipk.nilai_ipk');
    $this->db->join('tb_pekerjaan', 'tb_latih.c2 = tb_pekerjaan.nilai_pekerjaan');
    $this->db->join('tb_gaji', 'tb_latih.c3 = tb_gaji.nilai_gaji');
    $this->db->join('tb_tanggungan', 'tb_latih.c4 = tb_tanggungan.nilai_tanggungan');
    $hasil = $this->db->get();
    return $hasil->result_array();
  }

  function AksiTambahDataLatih($data)
  {
    $hasil = $this->db->insert('tb_latih', $data);
    return $hasil;
  }

  function AksiHapusDataLatih($where)
  {
    $hapus = $this->db->delete('tb_latih', $where);
    return $hapus;
  }

  function detail_dataLatih($id_latih)
  {
    $query = $this->db->get_where('tb_latih', ['id_latih' => $id_latih]);
    return $query->row_array();
  }
  // ========================================================================================

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

  public function countTotalDataLatih()
  {
    $query = $this->db->query("SELECT * FROM tb_latih");
    $total = $query->num_rows();
    return $total;
  }

  public function countTidakLayak()
  {
    $query = $this->db->query("SELECT * FROM tb_latih WHERE hasil = '0' ");
    return $query->num_rows();
  }

  public function countLayak()
  {
    $query = $this->db->query("SELECT * FROM tb_latih WHERE hasil = '1' ");
    return $query->num_rows();
  }

  public function CountTanggungBanyak()
  {
    $hasil = $this->db->query("SELECT * FROM training WHERE tanggung = 'Banyak' ");
    return $hasil->num_rows();
  }

  public function CountPln450()
  {
    $hasil = $this->db->query("SELECT * FROM training WHERE pln = '450' ");
    return $hasil->num_rows();
  }

  public function CountLayakLayak()
  {
    $hasil = $this->db->query("SELECT * FROM training WHERE layak = 'layak' ");
    return $hasil->num_rows();
  }
}
