<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Admin_m');
    $this->load->library('Excel');
  }
  function dataexcel(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'List Pembayaran Calon Peserta';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.pmb.unidayan.ac.id" );
      $file->getProperties ()->setTitle ( "List Calon Peserta sudah membayar" );
      $file->getProperties ()->setSubject ( "Daftar Calon Peserta" );
      $file->getProperties ()->setDescription ( "Daftar Calon Peserta" );
      $file->getProperties ()->setKeywords ( "Daftar Calon Peserta" );
      $file->getProperties ()->setCategory ( "Calon Peserta" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Daftar Dosen" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A1", "No" );
      $sheet->setCellValue ( "B1", "Nama Satuan Kerja" );
      $sheet->setCellValue ( "C1", "Parent Unit" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 2;
      $hasil = $this->Admin_m->select_data('master_satuan_kerja');
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nama_satuan_kerja));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->parent_unit) );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_satuan_kerja.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function dataexcel_honorer(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'List Laporan Data Honorer';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.simpegbuton.go.id" );
      $file->getProperties ()->setTitle ( "List Laporan Data Honorer" );
      $file->getProperties ()->setSubject ( "Daftar Honorer" );
      $file->getProperties ()->setDescription ( "Daftar Honorer" );
      $file->getProperties ()->setKeywords ( "Daftar Honorer" );
      $file->getProperties ()->setCategory ( "Daftar Honorer" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Daftar Honorer" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A1", "No" );
      $sheet->setCellValue ( "B1", "NAMA" );
      $sheet->setCellValue ( "C1", "ALAMAT" );
      $sheet->setCellValue ( "D1", "NOMOR SK" );
      $sheet->setCellValue ( "E1", "LOKASI KERJA" );
      $sheet->setCellValue ( "F1", "TMT" );
      $sheet->setCellValue ( "G1", "NOMOR HP" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 2;
      $hasil = $this->Admin_m->select_data('honorer');
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, strtoupper($data->nama));
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->alamat) );
        $sheet->setCellValue ( "D".$nocel, strtoupper($data->nomor_sk));
        $sheet->setCellValue ( "E".$nocel, strtoupper($this->Admin_m->detail_data_order('master_lokasi_kerja','id_lokasi_kerja',$data->id_lokasi_kerja)->lokasi_kerja) );
        $sheet->setCellValue ( "F".$nocel, strtoupper($data->tmt));
        $sheet->setCellValue ( "G".$nocel, strtoupper($data->no_hp) );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_honorer.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function data_pegawai(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "simpeg" );
      $file->getProperties ()->setLastModifiedBy ( "www.simpeg.com" );
      $file->getProperties ()->setTitle ( "Daftar Pegawai" );
      $file->getProperties ()->setSubject ( "Daftar Pegawai" );
      $file->getProperties ()->setDescription ( "Daftar Pegawai" );
      $file->getProperties ()->setKeywords ( "Daftar Pegawai" );
      $file->getProperties ()->setCategory ( "Daftar Pegawai" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Daftar Listing Nominatif PNS" );
      $sheet->mergeCells('A1:AA1');
      $sheet->setCellValue ( "A1", "DAFTAR LISTING NOMINATIF PNS" );
      $sheet->mergeCells('A2:AA2');
      $sheet->setCellValue ( "A2", "DI LINGKUP PEMERINTAH KABUPATEN BUTON" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      
      $sheet->mergeCells('A4:A6');
      $sheet->setCellValue ( "A4", "No" );
      $sheet->mergeCells('B4:C4');
      $sheet->setCellValue ( "B4", "NIP" );
      $sheet->mergeCells('B5:B6');
      $sheet->setCellValue ( "B5", "NIP Lama" );
      $sheet->mergeCells('C5:C6');
      $sheet->setCellValue ( "C5", "NIP Baru" );
      $sheet->mergeCells('D4:D6');
      $sheet->setCellValue ( "D4", "Nama" );
      $sheet->mergeCells('E4:E6');
      $sheet->setCellValue ( "E4", "Gelar Depan" );
      $sheet->mergeCells('F4:F6');
      $sheet->setCellValue ( "F4", "Gelar Belakang" );
      $sheet->mergeCells('G4:H4');
      $sheet->setCellValue ( "G4", "Tempat Tanggal Lahir" );
      $sheet->mergeCells('G5:G6');
      $sheet->setCellValue ( "G5", "Tempat Lahir" );
      $sheet->mergeCells('H5:H6');
      $sheet->setCellValue ( "H5", "Tanggal Lahir" );
      $sheet->mergeCells('I4:K4');
      $sheet->setCellValue ( "I4", "CPNS/PNS" );
      $sheet->mergeCells('I5:I6');
      $sheet->setCellValue ( "I5", "Gol Awal" );
      $sheet->mergeCells('J5:J6');
      $sheet->setCellValue ( "J5", "TMT CPNS" );
      $sheet->mergeCells('K5:K6');
      $sheet->setCellValue ( "K5", "TMT PNS" );
      $sheet->mergeCells('L4:L6');
      $sheet->setCellValue ( "L4", "L/p" );
      $sheet->mergeCells('M4:P4');
      $sheet->setCellValue ( "M4", "Golongan Ruang" );
      $sheet->mergeCells('M5:M6');
      $sheet->setCellValue ( "M5", "Gol Akhir" );
      $sheet->mergeCells('N5:N6');
      $sheet->setCellValue ( "N5", "TMT" );
      $sheet->mergeCells('O5:P5');
      $sheet->setCellValue ( "O5", "Masa Kerja" );
      $sheet->setCellValue ( "O6", "MK Thn" );
      $sheet->setCellValue ( "P6", "MK Bln" );
      $sheet->mergeCells('Q4:V4');
      $sheet->setCellValue ( "Q4", "Jabatan" );
      $sheet->mergeCells('Q5:S5');
      $sheet->setCellValue ( "Q5", "Struktural" );
      $sheet->setCellValue ( "Q6", "Eselon" );
      $sheet->setCellValue ( "R6", "TMT Struktural" );
      $sheet->setCellValue ( "S6", "NM Jab Struktural" );
      $sheet->mergeCells('T5:U5');
      $sheet->setCellValue ( "T5", "Fungsional Tertentu" );
      $sheet->setCellValue ( "T6", "FT Tertentu" );
      $sheet->setCellValue ( "U6", "FT Nm Jabatan" );
      $sheet->setCellValue ( "V5", "Fungsional Umum" );
      $sheet->setCellValue ( "V6", "Nama Jabatan" );
      $sheet->mergeCells('W4:W6');
      $sheet->setCellValue ( "W4", "Unit Kerja" );
      $sheet->mergeCells('X4:X6');
      $sheet->setCellValue ( "X4", "Unit Kerja Induk" );
      $sheet->mergeCells('Y4:Z4');
      $sheet->setCellValue ( "Y4", "Pendidikan" );
      $sheet->mergeCells('Y5:Y6');
      $sheet->setCellValue ( "Y5", "Nama Pendidikan Terakhir" );
      $sheet->mergeCells('Z5:Z6');
      $sheet->setCellValue ( "Z5", "Lulus" );
      $sheet->mergeCells('AA4:AA6');
      $sheet->setCellValue ( "AA4", "Ked.Huk" );

      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 8;
      $hasil = $this->Admin_m->data_pegawai();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, $data->nip );
        $sheet->setCellValue ( "C".$nocel, $data->nip_lama );
        $sheet->setCellValue ( "D".$nocel, $data->nama_pegawai );
        $sheet->setCellValue ( "E".$nocel, $data->gelar_dpn );
        $sheet->setCellValue ( "F".$nocel, $data->gelar_belakang );
        $sheet->setCellValue ( "G".$nocel, $data->tempat_lahir );
        $sheet->setCellValue ( "H".$nocel, $data->tanggal_lahir );
        $sheet->setCellValue ( "I".$nocel, @$this->Admin_m->detail_data_order('master_golongan','id_golongan',$data->id_golongan)->golongan);
        $sheet->setCellValue ( "J".$nocel, $data->tmt_cpns );
        $sheet->setCellValue ( "K".$nocel, $data->tmt_pns );
        $sheet->setCellValue ( "L".$nocel, $data->jenis_kelamin );
        $sheet->setCellValue ( "M".$nocel, @$this->Admin_m->riwayat_max($data->id_pegawai)->golongan);
        $sheet->setCellValue ( "N".$nocel, @$this->Admin_m->riwayat_max($data->id_pegawai)->tanggal_mulai);
        $sheet->setCellValue ( "O".$nocel, @$this->Admin_m->riwayat_max($data->id_pegawai)->masa_kerja_bulan );
        $sheet->setCellValue ( "P".$nocel, @$this->Admin_m->riwayat_max($data->id_pegawai)->masa_kerja_tahun );
        $sheet->setCellValue ( "Q".$nocel, @$this->Admin_m->detail_data_order('master_eselon','id_eselon',$data->id_eselon)->nama_eselon );
        $sheet->setCellValue ( "R".$nocel, @$this->Admin_m->jabatan_min($data->id_pegawai)->tanggal_mulai);
        $sheet->setCellValue ( "S".$nocel, @$this->Admin_m->jabatan_min($data->id_pegawai)->nama_jabatan );
        $sheet->setCellValue ( "T".$nocel, $data->nip_lama );
        $sheet->setCellValue ( "U".$nocel, $data->nip_lama );
        $sheet->setCellValue ( "V".$nocel, $data->nip_lama );
        $sheet->setCellValue ( "W".$nocel, @$this->Admin_m->detail_data_order('master_unit_kerja','id_unit_kerja',$data->id_unit_kerja)->nama_unit_kerja);
        $sheet->setCellValue ( "X".$nocel, @$this->Admin_m->detail_data_order('master_unit_kerja','id_unit_kerja',$data->id_unit_kerja)->parent_unit);
        $sheet->setCellValue ( "Y".$nocel, @$this->Admin_m->detail_data_order('data_pendidikan','id_pegawai',$data->id_pegawai)->tingkat_pendidikan );
        $sheet->setCellValue ( "Z".$nocel, @$this->Admin_m->detail_data_order('data_pendidikan','id_pegawai',$data->id_pegawai)->tanggal_lulus );
        $sheet->setCellValue ( "AA".$nocel, $data->nip_lama );
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="daftar_pegawai.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function exceldaftargel2(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Daftar Calon Peserta Mahasiswa Baru';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.pmb.unidayan.ac.id" );
      $file->getProperties ()->setTitle ( "List Calon Peserta sudah membayar" );
      $file->getProperties ()->setSubject ( "Daftar Calon Peserta" );
      $file->getProperties ()->setDescription ( "Daftar Calon Peserta" );
      $file->getProperties ()->setKeywords ( "Daftar Calon Peserta" );
      $file->getProperties ()->setCategory ( "Calon Peserta" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Daftar Dosen" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A1", "No" );
      $sheet->setCellValue ( "B1", "Noreg" );
      $sheet->setCellValue ( "C1", "Nama" );
      $sheet->setCellValue ( "D1", "Pilihan 1" );
      $sheet->setCellValue ( "E1", "Pilihan 2" );
      $sheet->setCellValue ( "F1", "Pilihan 3" );
      $sheet->setCellValue ( "G1", "Kelompok" );
      $sheet->setCellValue ( "H1", "Jurusan" );
      $sheet->setCellValue ( "I1", "Email" );
      $sheet->setCellValue ( "J1", "No Hp" );
      $sheet->setCellValue ( "K1", "L/P" );
      $sheet->setCellValue ( "L1", "Agama" );
      $sheet->setCellValue ( "M1", "Tgl Lhr" );
      $sheet->setCellValue ( "N1", "Tmp Lhr" );
      $sheet->setCellValue ( "O1", "Asal Sekolah" );
      $sheet->setCellValue ( "P1", "NEM" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 2;
      $hasil = $data['hasil'] = $this->Peserta_m->databayargel2();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        
        // echo "<pre>";print_r($this->Peserta_m->detagama($data->id_agama));echo "<pre/>";exit();
       
        if ($this->Peserta_m->detagama($data->id_agama) == TRUE) {
           $agama = $this->Peserta_m->detagama($data->id_agama)->nm_agama;
        }else{
          $agama = 'Tidak Diisi';
        }
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, $data->noreg );
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_mhs) );
        $abjad = 1;
        foreach ($this->Peserta_m->priopilgel2($data->id_mhs) as $datas) {
          if ($abjad == 1) {
          	$abj = 'D';
          }elseif ($abjad == 2) {
          	$abj = 'E';
          }else{
          	$abj = 'F';
          }
          $sheet->setCellValue ( $abj.$nocel, strtoupper($datas->nama_prodi) );
          $abjad++;
        }
        // echo "<pre>";print_r($this->Peserta_m->priopil($data->id_mhs));echo "<pre/>";exit();
        if ($data->kelompok == 1 ) {
          $sheet->setCellValue ( "G".$nocel, 'IPA ');
        }elseif ($data->kelompok == 2) {
          $sheet->setCellValue ( "G".$nocel, 'IPS ');
        }else{
          $sheet->setCellValue ( "G".$nocel, 'IPC ');
        }
        $sheet->setCellValue ( "H".$nocel, $data->jurse);
        $sheet->setCellValue ( "I".$nocel, $data->email_mhs);
        $sheet->setCellValue ( "J".$nocel, $data->no_hp_mhs);
        $sheet->setCellValue ( "K".$nocel, strtoupper($data->gender_mhs));
        $sheet->setCellValue ( "L".$nocel, strtoupper($agama));
        $sheet->setCellValue ( "M".$nocel, $data->tgl_lhr_mhs);
        $sheet->setCellValue ( "N".$nocel, strtoupper($data->tmpt_lahir));
        $sheet->setCellValue ( "O".$nocel, strtoupper($data->asal_sekolah));
        $sheet->setCellValue ( "P".$nocel, $data->nem);
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="daftar lengkap calon peserta gelombang ke 2.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function exceldaftargel3(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Daftar Calon Peserta Mahasiswa Baru';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.pmb.unidayan.ac.id" );
      $file->getProperties ()->setTitle ( "List Calon Peserta sudah membayar" );
      $file->getProperties ()->setSubject ( "Daftar Calon Peserta" );
      $file->getProperties ()->setDescription ( "Daftar Calon Peserta" );
      $file->getProperties ()->setKeywords ( "Daftar Calon Peserta" );
      $file->getProperties ()->setCategory ( "Calon Peserta" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Daftar Dosen" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A1", "No" );
      $sheet->setCellValue ( "B1", "Noreg" );
      $sheet->setCellValue ( "C1", "Nama" );
      $sheet->setCellValue ( "D1", "Pilihan 1" );
      $sheet->setCellValue ( "E1", "Pilihan 2" );
      $sheet->setCellValue ( "F1", "Pilihan 3" );
      $sheet->setCellValue ( "G1", "Kelompok" );
      $sheet->setCellValue ( "H1", "Jurusan" );
      $sheet->setCellValue ( "I1", "Email" );
      $sheet->setCellValue ( "J1", "No Hp" );
      $sheet->setCellValue ( "K1", "L/P" );
      $sheet->setCellValue ( "L1", "Agama" );
      $sheet->setCellValue ( "M1", "Tgl Lhr" );
      $sheet->setCellValue ( "N1", "Tmp Lhr" );
      $sheet->setCellValue ( "O1", "Asal Sekolah" );
      $sheet->setCellValue ( "P1", "NEM" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 2;
      $hasil = $data['hasil'] = $this->Peserta_m->databayargel3();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        
        // echo "<pre>";print_r($this->Peserta_m->detagama($data->id_agama));echo "<pre/>";exit();
       
        if ($this->Peserta_m->detagama($data->id_agama) == TRUE) {
           $agama = $this->Peserta_m->detagama($data->id_agama)->nm_agama;
        }else{
          $agama = 'Tidak Diisi';
        }
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, $data->noreg );
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_mhs) );
        $abjad = 1;
        foreach ($this->Peserta_m->priopilgel2($data->id_mhs) as $datas) {
          if ($abjad == 1) {
            $abj = 'D';
          }elseif ($abjad == 2) {
            $abj = 'E';
          }else{
            $abj = 'F';
          }
          $sheet->setCellValue ( $abj.$nocel, strtoupper($datas->nama_prodi) );
          $abjad++;
        }
        // echo "<pre>";print_r($this->Peserta_m->priopil($data->id_mhs));echo "<pre/>";exit();
        if ($data->kelompok == 1 ) {
          $sheet->setCellValue ( "G".$nocel, 'IPA ');
        }elseif ($data->kelompok == 2) {
          $sheet->setCellValue ( "G".$nocel, 'IPS ');
        }else{
          $sheet->setCellValue ( "G".$nocel, 'IPC ');
        }
        $sheet->setCellValue ( "H".$nocel, $data->jurse);
        $sheet->setCellValue ( "I".$nocel, $data->email_mhs);
        $sheet->setCellValue ( "J".$nocel, $data->no_hp_mhs);
        $sheet->setCellValue ( "K".$nocel, strtoupper($data->gender_mhs));
        $sheet->setCellValue ( "L".$nocel, strtoupper($agama));
        $sheet->setCellValue ( "M".$nocel, $data->tgl_lhr_mhs);
        $sheet->setCellValue ( "N".$nocel, strtoupper($data->tmpt_lahir));
        $sheet->setCellValue ( "O".$nocel, strtoupper($data->asal_sekolah));
        $sheet->setCellValue ( "P".$nocel, $data->nem);
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="daftar lengkap calon peserta gelombang ke 2.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function excelalldaftar(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Daftar Calon Peserta Mahasiswa Baru';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "www.pmb.unidayan.ac.id" );
      $file->getProperties ()->setTitle ( "List Calon Peserta sudah membayar" );
      $file->getProperties ()->setSubject ( "Daftar Calon Peserta" );
      $file->getProperties ()->setDescription ( "Daftar Calon Peserta" );
      $file->getProperties ()->setKeywords ( "Daftar Calon Peserta" );
      $file->getProperties ()->setCategory ( "Calon Peserta" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Daftar Peserta Mahasiswa Baru" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A1", "No" );
      $sheet->setCellValue ( "B1", "Noreg" );
      $sheet->setCellValue ( "C1", "Nama" );
      $sheet->setCellValue ( "D1", "Status" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 2;
      $hasil = $data['hasil'] = $this->Peserta_m->alldaftar();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, $data->noreg );
        $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_mhs) );
        if ($data->pembayaran == 1) {
          $sheet->setCellValue ( "D".$nocel, 'Sudah Membayar' );
        }else{
          $sheet->setCellValue ( "D".$nocel, 'Belum Membayar' );
        }
        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="daftar lengkap calon peserta.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
}
?>