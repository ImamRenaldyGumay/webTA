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
        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Dashboard Admin'
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/Index', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function DataFakultas()
    {
        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Data Fakultas',
            'fakultas' => $this->Admin->getFakultas()
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/DataFakultas', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function TambahDataFakultas()
    {
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'trim|required');
        $this->form_validation->set_message('required', '{field} harus di isi!.');
        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Tambah Data Fakultas',
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Header', $data);
            $this->load->view('templates/Navbar', $data);
            $this->load->view('templates/Sidebar', $data);
            $this->load->view('Action/TambahDataFakultas', $data);
            $this->load->view('templates/Footer', $data);
        } else {
            $data = [
                'nama_fakultas' => $this->input->post('nama_fakultas')
            ];
            $tambahFakultas =  $this->Admin->TambahFakultas($data);
            if ($tambahFakultas) {
                $this->fungsiPeringatan("Data Berhasil di Tambahkan");
                redirect('DataFakultas', 'refresh');
            } else {
                $this->fungsiPeringatan("Data Gagal di Tambahkan");
                redirect('DataFakultas', 'refresh');
            }
        }
    }

    public function HapusDataFakultas($id_fakultas)
    {
        $hapusDataFakultas = $this->Admin->HapusDataFakultas($id_fakultas);
        if ($hapusDataFakultas) {
            $this->fungsiPeringatan("Data Berhasil di Hapus");
            redirect('DataFakultas', 'refresh');
        } else {
            $this->fungsiPeringatan("Data Gagal di Hapus");
            redirect('DataFakultas', 'refresh');
        }
    }

    public function EditDataFakultas($id_fakultas)
    {
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'trim|required');
        $this->form_validation->set_message('required', '{field} harus di isi!.');
        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Edit Data Fakultas',
            'ubah' => $this->Admin->detail_dataFakultas($id_fakultas)
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Action/EditDataFakultas', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function AksiEditDataFakultas()
    {
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'trim|required');
        $this->form_validation->set_message('required', '{field} harus di isi!.');

        $editFakultas =  $this->Admin->EditDataFakultas();
        if ($editFakultas) {
            $this->fungsiPeringatan("Data Berhasil di Edit");
            redirect('DataFakultas', 'refresh');
        } else {
            $this->fungsiPeringatan("Data Gagal di Edit");
            redirect('DataFakultas', 'refresh');
        }
    }

    public function DataProdi()
    {
        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Data Prodi',
            'prodi' => $this->Admin->getProdi(),
            'fakultas' => $this->db->get('tb_fakultas')->result_array()
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/DataProdi', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function TambahDataProdi()
    {
        $this->form_validation->set_rules('id_fakultas', 'Nama Fakultas', 'trim|required');
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'trim|required');
        $this->form_validation->set_message('required', '{field} harus di isi!.');
        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Data Prodi',
            'prodi' => $this->Admin->getProdi(),
            'fakultas' => $this->db->get('tb_fakultas')->result_array()
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Action/TambahDataProdi', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function AksiTambahDataProdi()
    {
        $tambahProdi = $this->Admin->TambahDataProdi();
        if ($tambahProdi) {
            $this->fungsiPeringatan("Data Berhasil di Tambahkan");
            redirect('DataProdi', 'refresh');
        } else {
            $this->fungsiPeringatan("Data Gagal di Tambahkan");
            redirect('DataProdi', 'refresh');
        }
    }

    public function HapusDataProdi($id_prodi)
    {
        $where = array('id_prodi' => $id_prodi);
        $hapusProdi =  $this->db->delete('tb_prodi', $where);
        if ($hapusProdi) {
            $this->fungsiPeringatan("Data Berhasil di Hapus");
            redirect('DataProdi', 'refresh');
        } else {
            $this->fungsiPeringatan("Data Gagal di Hapus");
            redirect('DataProdi', 'refresh');
        }
    }

    public function EditDataProdi()
    {
        $this->form_validation->set_rules('id_fakultas', 'Nama Fakultas', 'trim|required');
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'trim|required');
        $this->form_validation->set_message('required', '{field} harus di isi!.');
        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Data Prodi',
            'prodi' => $this->Admin->getProdi(),
            'fakultas' => $this->db->get('tb_fakultas')->result_array()
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Action/TambahDataProdi', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function AksiEditDataProdi()
    {
        $id_prodi = $this->input->post('id_prodi');
        $nama_prodi = $this->input->post('nama_prodi');
        $data = [
            'nama_prodi' => $nama_prodi
        ];
        $where = ['id_prodi' => $id_prodi];
        $this->db->where($where);
        $editProdi = $this->db->update('tb_prodi', $data);
        if ($editProdi) {
            $this->fungsiPeringatan("Data Berhasil di Edit");
            redirect('DataProdi', 'refresh');
        } else {
            $this->fungsiPeringatan("Data Gagal di Edit");
            redirect('DataProdi', 'refresh');
        }
        redirect('DataProdi', 'refresh');
    }

    public function DataKriteria()
    {
        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Data Kriteria',
            'kriteria' => $this->Admin->getKriteria()
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/DataKriteria', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function TambahDataKriteria()
    {
        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required');
        $this->form_validation->set_message('required', '{field} harus di isi!.');

        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Tambah Data Kriteria'
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Header', $data);
            $this->load->view('templates/Navbar', $data);
            $this->load->view('templates/Sidebar', $data);
            $this->load->view('Action/TambahDataKriteria', $data);
            $this->load->view('templates/Footer', $data);
        } else {
            $nama_kriteria = $this->input->post('nama_kriteria');
            $data = ['nama_kriteria' => $nama_kriteria];
            $tambahKriteria = $this->Admin->tambahKriteria($data);
            if ($tambahKriteria) {
                $this->fungsiPeringatan("Data Berhasil di Tambahkan");
                redirect('DataKriteria', 'refresh');
            } else {
                $this->fungsiPeringatan("Data Gagal di Tambahkan");
                redirect('DataKriteria', 'refresh');
            }
        }
    }

    public function HapusDataKriteria($id_kriteria)
    {
        $where = array('id_kriteria' => $id_kriteria);
        $hapusKriteria = $this->db->delete('tb_kriteria', $where);
        if ($hapusKriteria) {
            $this->fungsiPeringatan("Data Berhasil di Hapus");
            redirect('DataKriteria', 'refresh');
        } else {
            $this->fungsiPeringatan("Data Gagal di Hapus");
            redirect('DataKriteria', 'refresh');
        }
    }

    public function EditDataKriteria($id_kriteria)
    {
        $this->form_validation->set_rules('id_fakultas', 'Nama Fakultas', 'trim|required');
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'trim|required');
        $this->form_validation->set_message('required', '{field} harus di isi!.');

        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Edit Data Kriteria',
            'kriteria' => $this->Admin->detail_dataKriteria($id_kriteria)
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/EditDataKriteria', $data);
        $this->load->view('templates/Footer', $data);
    }

    // ===========================================================================================================================
    // Aksi Data Krit

    public function DataKrit()
    {
        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Data Krit',
            'IPK' => $this->db->get('tb_ipk')->result_array(),
            'Pekerjaan' => $this->db->get('tb_pekerjaan')->result_array(),
            'Gaji' => $this->db->get('tb_gaji')->result_array(),
            'Tanggung' => $this->db->get('tb_tanggungan')->result_array()
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/DataKrit', $data);
        $this->load->view('templates/Footer', $data);
    }
    // ==============================================================================================================================

    // ===================================================================================================================================
    // Aksi Data Latih
    public function DataLatih()
    {
        $data = array(
            'user' =>  $this->Admin->getNama()->row_array(),
            'title' => 'Data Latih',
            'latih' => $this->Admin->getLatih(),
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/Datalatih', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function TambahDataLatih()
    {
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $nim_mahasiswa = $this->input->post('nim_mahasiswa');
        $C1 = $this->input->post('C1');
        $C2 = $this->input->post('C2');
        $C3 = $this->input->post('C3');
        $C4 = $this->input->post('C4');
        $hasil = $this->input->post('hasil');

        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required|is_unique[tb_latih.nama_mahasiswa]');
        $this->form_validation->set_rules('nim_mahasiswa', 'NIM Mahasiswa', 'required|is_unique[tb_latih.nim_mahasiswa]|numeric');
        $this->form_validation->set_message('required', '{field} harus di isi!.');
        $this->form_validation->set_message('is_unique', '{field} Harus berbeda.');
        $this->form_validation->set_message('numeric', '{field} Harus Berupa angka.');
        if ($C1 == 0 && $C2 == 0 && $C3 == 0 && $C4 == 0 && $hasil == 0) {
            $this->form_validation->set_rules('C1', 'IPK Mahasiswa', 'required');
            $this->form_validation->set_rules('C2', 'Pekerjaan Orang Tua', 'required');
            $this->form_validation->set_rules('C3', 'Pengasilan Orang Tua', 'required');
            $this->form_validation->set_rules('C4', 'Tanggungan Orang Tua', 'required');
            $this->form_validation->set_rules('hasil', 'Hasil', 'required');
        }

        $data = array(
            'user' =>  $this->Admin->getNama()->row_array(),
            'title' => 'Tambah Data Latih',
            'ipk' => $this->db->get('tb_ipk')->result_array(),
            'pekerjaan' => $this->db->get('tb_pekerjaan')->result_array(),
            'gaji' => $this->db->get('tb_gaji')->result_array(),
            'tanggung' => $this->db->get('tb_tanggungan')->result_array()
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Header', $data);
            $this->load->view('templates/Navbar', $data);
            $this->load->view('templates/Sidebar', $data);
            $this->load->view('Action/TambahDataLatih', $data);
            $this->load->view('templates/Footer', $data);
        } else {
            $data = [
                'nama_mahasiswa' => $nama_mahasiswa,
                'nim_mahasiswa' => $nim_mahasiswa,
                'c1' => $C1,
                'c2' => $C2,
                'c3' => $C3,
                'c4' => $C4,
                'hasil' => $hasil
            ];
            $tambahDataLatih = $this->Admin->aksiTambahDataLatih($data);
            if ($tambahDataLatih) {
                $this->fungsiPeringatan("Data Berhasil di Tambahkan");
                redirect('DataLatih', 'refresh');
            } else {
                $this->fungsiPeringatan("Data Gagal di Tambahkan");
                redirect('DataLatih', 'refresh');
            }
        }
    }
    public function HapusDataLatih($id_latih)
    {
        $where = array('id_latih' => $id_latih);
        $hapusKriteria = $this->Admin->AksiHapusDataLatih($where);
        if ($hapusKriteria) {
            $this->fungsiPeringatan("Data Berhasil di Hapus");
            redirect('DataLatih', 'refresh');
        } else {
            $this->fungsiPeringatan("Data Gagal di Hapus");
            redirect('DataLatih', 'refresh');
        }
    }

    public function EditDataLatih($id_latih)
    {
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required|is_unique[tb_latih.nama_mahasiswa]');
        $this->form_validation->set_rules('nim_mahasiswa', 'NIM Mahasiswa', 'required|is_unique[tb_latih.nim_mahasiswa]|numeric');
        $this->form_validation->set_message('required', '{field} harus di isi!.');
        $this->form_validation->set_message('is_unique', '{field} Harus berbeda.');
        $this->form_validation->set_message('numeric', '{field} Harus Berupa angka.');

        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Edit Data Latih',
            'latih' => $this->Admin->detail_dataLatih($id_latih),
            'ipk' => $this->db->get('tb_ipk')->result_array(),
            'pekerjaan' => $this->db->get('tb_pekerjaan')->result_array(),
            'gaji' => $this->db->get('tb_gaji')->result_array(),
            'tanggung' => $this->db->get('tb_tanggungan')->result_array()
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Action/EditDataLatih', $data);
        $this->load->view('templates/Footer', $data);
    }

    function AksiEditDataLatih()
    {
        $id_latih = $this->input->post('id_latih');
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $nim_mahasiswa = $this->input->post('nim_mahasiswa');
        $C1 = $this->input->post('C1');
        $C2 = $this->input->post('C2');
        $C3 = $this->input->post('C3');
        $C4 = $this->input->post('C4');
        $hasil = $this->input->post('hasil');
        $data = [
            'nama_mahasiswa' => $nama_mahasiswa,
            'nim_mahasiswa' => $nim_mahasiswa,
            'c1' => $C1,
            'c2' => $C2,
            'c3' => $C3,
            'c4' => $C4,
            'hasil' => $hasil
        ];
        $where = ['id_latih' => $id_latih];
        $this->db->where($where);
        $editLatih = $this->db->update('tb_latih', $data);
        if ($editLatih) {
            $this->fungsiPeringatan("Data Berhasil di Edit");
            redirect('DataLatih', 'refresh');
        } else {
            $this->fungsiPeringatan("Data Gagal di Edit");
            redirect('DataLatih', 'refresh');
        }
    }
    // =======================================================================================================================

    public function DataMahasiswaHitung()
    {
        $data = array(
            'user' =>  $this->Admin->getNama()->row_array(),
            'title' => 'Data Mahasiswa Hitung',
            'mahasiswa' => $this->db->get('tb_mahasiswa')
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/DataMahasiswaLatih', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function DataHitung()
    {
        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Data Hitung',
            'hitung' => $this->db->get('tb_hitung')->result_array()
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/DataHitung', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function Training()
    {
        $CountTanggungBanyak = $this->Admin->CountTanggungBanyak();
        $CountPln450 = $this->Admin->CountPln450();
        $CountLayakLayak = $this->Admin->CountLayakLayak();
        $data = array(
            'user' => $this->Admin->getNama()->row_array(),
            'title' => 'Data Training',
            'training' => $this->db->get('training')->result_array(),
            'CountTanggungBanyak' => $CountTanggungBanyak,
            'CountPln450' => $CountPln450,
            'CountLayakLayak' => $CountLayakLayak
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/Training', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function fungsiPeringatan($isiPeringatan)
    {
        echo "<script>alert('" . $isiPeringatan . "');</script>";
    }
}
