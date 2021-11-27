<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Instruktur  extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('idakun') == '' or $this->session->userdata('role') != '3' or $this->session->userdata('status') == '') {
      $this->session->sess_destroy();
      redirect('Home', 'refresh');
    } else {
      $this->load->model('Instruktur_Model', 'Instruktur');
    }
  }

  public function index()
  {
    $data = array(
      'user' => $this->Instruktur->getNama()->row_array(),
      'title' => 'Dashboard Instuktur'
    );
    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('Instruktur/Index', $data);
    $this->load->view('templates/Footer', $data);
  }
  function DetailUserInstruktur()
  {
    $data = array(
      'user' => $this->Instruktur->getNama()->row_array(),
      'title' => 'My Profile',
    );
    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('Instruktur/DetailUser', $data);
    $this->load->view('templates/Footer', $data);
  }
  public function DataBeasiswa()
  {
    $data = array(
      'user' => $this->Instruktur->getNama()->row_array(),
      'title' => 'Data Beasiswa',
      'hitung' => $this->Instruktur->getDataHitungAkhir()
    );
    $this->load->view('templates/Header', $data);
    $this->load->view('templates/Navbar', $data);
    $this->load->view('templates/Sidebar', $data);
    $this->load->view('Instruktur/DataBeasiswa', $data);
    $this->load->view('templates/Footer', $data);
  }

  public function export_excel()
  {
    $data = array(
      'title' => 'Laporan Excel',
      'user' => $this->Instruktur->listing()
    );
    $this->load->view('Instruktur/laporan_excel', $data);
  }

  function ExportDataBeasiswa()
  {
    // Load Plugin class PHPEXCEL
    include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

    // Panggil class PHPExcel nya
    $excel = new PHPExcel();

    // Settingan awal fil excel
    $excel->getProperties()->setCreator('M. Imam Renaldy Gumay')
      ->setLastModifiedBy('M. Imam Renaldy Gumay')
      ->setTitle("Data Siswa")
      ->setSubject("Siswa")
      ->setDescription("Laporan Semua Data Siswa")
      ->setKeywords("Data Siswa");

    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA MAHASISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "NIM"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "FAKULTAS"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "PRODI"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "IPK"); // Set kolom F3 dengan tulisan "PRODI"
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->Instruktur->getDataHitungAkhir();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->nama_mahasiswa);
      $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->nim_mahasiswa);
      $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->nama_fakultas);
      $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->nama_prodi);
      $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->c1);

      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom F

    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
}
