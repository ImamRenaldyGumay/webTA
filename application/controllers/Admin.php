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

    public function DataLatih()
    {
        $data = array(
            'user' => $this->db->get_where('tb_user', ['nama' => $this->session->userdata('nama')])->row_array(),
            'title' => 'Data Latih',
            'latih' => $this->Admin->getLatih(),
            'fakultas' => $this->db->get('tb_fakultas')->result_array(),
            'prodi' => $this->db->get('tb_prodi')->result_array(),
            'beasiswa' => $this->db->get('tb_beasiswa')->result_array(),
            'c1' => $this->Admin->getC1(),
            'c2' => $this->Admin->getC2(),
            'c3' => $this->Admin->getC3(),
            'c4' => $this->Admin->getC4(),
        );
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Navbar', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/Datalatih', $data);
        $this->load->view('templates/Footer', $data);
    }

    public function fungsiPeringatan($isiPeringatan)
    {
        echo "<script>alert('" . $isiPeringatan . "');</script>";
    }

    // public function TambahAdmin()
    // {
    //     $this->form_validation->set_rules('nama', 'Nama', 'trim|required|valid_email');
    //     $this->form_validation->set_rules('email', 'email', 'trim|valid_email|required|min_length[4]|is_unique[tb_user.email]');

    //     $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
    //     $this->form_validation->set_message('required', '{field} harus di isi!.');
    //     $this->form_validation->set_message('valid_email', 'Harus berupa {field}!.');
    //     $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
    //     $this->form_validation->set_message('is_unique', '{field} ini sudah ada yang punya');

    //     $getAdmin = $this->Admin->getAdmin();
    //     $data = array(
    //         'user' => $this->Admin->getNama()->row_array(),
    //         'title' => 'Tambah Admin',
    //         'admin' => $getAdmin
    //     );
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/Header', $data);
    //         $this->load->view('templates/Navbar', $data);
    //         $this->load->view('templates/Sidebar', $data);
    //         $this->load->view('Admin/TambahAdmin', $data);
    //         $this->load->view('templates/Footer', $data);
    //     } else {
    //         $data = [
    //             'nama' => $this->input->post('nama'),
    //             'email' => $this->input->post('email'),
    //             'password' => md5($this->input->post('password')),
    //             'role' => 2,
    //             'image' => 'pic.jpg',
    //             'is_active' => 1,
    //             'date_created' => time()
    //         ];
    //         $this->Admin->AksiTambahAdmin($data);
    //         $this->fungsiPeringatan("Data Berhasil di Tambah");
    //         redirect('Admin/TambahAdmin', 'refresh');
    //     }
    // }
}
