<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
  <style type="text/css">
  .colpading{padding: 0px 4px}
</style>
<!-- lgo -->
<link rel="shortcut icon" href="<?php echo base_url($brand); ?>">
<!-- css bootsrap 4.0 beta -->
<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">
<!-- google material icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">

<!-- css font css pribadi -->
<link rel="stylesheet" href="<?php echo base_url('asset/css/custom.css'); ?>">
<!-- jquery terlebih dahulu -->
<script src="<?php echo base_url('asset/js/jquery-3.2.1.min.js'); ?>" type="text/javascript"></script>
<!-- js bootstrap v.4 butuh pooper.js -->
<script src="<?php echo base_url('asset/js/popper.min.js'); ?>" type="text/javascript"></script>
<!-- js bootstrap v.4 -->
<script src="<?php echo base_url('asset/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 bglog">
        <h2 class="text-light text-center" style="margin-top: 20px "><?php echo $infopt->alias_pt; ?></h2>
        <div class="media">
          <img class="rounded-circle align-self-center mr-3" src="<?php echo base_url('asset/img/users/'.$users->profile) ?>" alt="<?php echo $users->profile;?>" width="50px">
          <div class="media-body">
            <h5 class="mt-0 text-light"><?php echo $users->username; ?></h5>
            <span class="text-dark text-sm"><?php echo $users->email; ?></span>
          </div>
        </div>
        <?php $this->view($aside); ?>
      </div>
      <div class="col-md-10">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" class="colpading"></span>
        </button>
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <a class="btn btn-info dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
                  <i class="material-icons">library_books</i> Master
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/') ?>"><i class="material-icons">label_outline</i>Status Pegawai</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/satuan_kerja') ?>"><i class="material-icons">bookmark_border</i>Satuan Kerja</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/ppk') ?>"><i class="material-icons">remove_red_eye</i>PPK</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/golongan') ?>"><i class="material-icons">compare_arrows</i>Golongan</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/eselon') ?>"><i class="material-icons">autorenew</i>Eselon</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/pelatihan') ?>"><i class="material-icons">assignment</i>Pelatihan</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/jabatan') ?>"><i class="material-icons">work</i>Jabatan</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/status_jabatan') ?>"><i class="material-icons">playlist_add_check</i>Jenis KP</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/penghargaan') ?>"><i class="material-icons">stars</i>Penghargaan</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/hukuman') ?>"><i class="material-icons">select_all</i>Hukuman</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/lokasi_pelatihan') ?>"><i class="material-icons">location_on</i>Lokasi Pelatihan</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/lokasi_kerja') ?>"><i class="material-icons">location_searching</i>Lokasi Kerja</a>
                </div>
              </li>
              <li class="nav-item dropdown" style="margin-left: 7px">
                <a class="btn btn-info dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">report</i> Laporan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/Export_excel') ?>"><i class="material-icons">assignment_ind</i>Data Pegawai</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/Export_honorer') ?>"><i class="material-icons">assignment_ind</i>Data Honorer</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/export/data_pegawai') ?>"><i class="material-icons">bookmark_border</i>Daftar Listing Nominatif PNS</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/Export_golongan') ?>"><i class="material-icons">select_all</i>Peg. Per Golongan</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/export/') ?>"><i class="material-icons">work</i>Peg. Per Jabatan</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/export/') ?>"><i class="material-icons">remove_red_eye</i>Peg. Per Pendidikan</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/export/') ?>"><i class="material-icons">remove_red_eye</i>Peg. Per SKPD</a>
                
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <?php $this->view($page); ?>
    <div id="footer_bottom" class="footer_bottom">
      <div class="text-light text-center"><?php  echo date('Y'); ?> © Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kabupaten Buton Tengah</div>
    </div>
  </div>
</body>
</html>

