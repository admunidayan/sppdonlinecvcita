<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url($brand); ?>">
	<!-- css bootsrap 4.0 beta -->
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">
	<!-- google material icon -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
</head>
<body style="font-family: Times New Roman">
	<div class="container-fluid">
		<div class="row">
			<div class="col"></div>
			<div class="col" style="font-size: 11px">
				Peraturan Bupati Buton Tengah Tentang<br/>
				Perjalanan Dinas Bagi bagi Pejabat Negara, Pimpinan dan<br/>
				Anggota DPRD, PNS dan Non PNS dilingkungan <br/>
				Pemerintah Kabupaten Buton Tengah T.A 2017<br/><br/>
				Nomor   :  33 Tahun 2016<br/>
				Tanggal : 7 November 2016.
			</div>
		</div>
		<div class="row" style="margin-top: 20px;">
			<div class="col text-center">
				<table width="100%" style="border-bottom:3px solid;">
					<tr>
						<td><img src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="100px"></td>
						<td>
							<h5>PEMERINTAH KABUPATEN BUTON TENGAH<br/><?php echo strtoupper($infopt->nama_info_pt); ?></h5>
							<p class="text-center"><?php echo $infopt->alamat_pt; ?><br/><?php echo $infopt->kontak_4.'<br/>'.strtoupper($infopt->kontak_3); ?></p>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col"></div>
			<div class="col">
				<table>
					<tr>
						<td width="30%">Lembar</td>
						<td width="5%">:</td>
						<td width="65%"></td>
					</tr>
					<tr>
						<td>Kode No</td>
						<td>:</td>
						<td></td>
					</tr>
					<tr>
						<td>Nomor</td>
						<td>:</td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h5 class="text-center"><u>SURAT PERINTAH PERJALANAN DINAS</u></h5>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<table width="100%" border="1" style="font-size: 11px">
					<tr>
						<td class="text-center">1.</td>
						<td>Pejabat Berwenang yang memberi perintah</td>
						<td width="60%"><?php echo $hasil2->pejabat_yang_memerintah; ?></td>
					</tr>
					<tr>
						<td class="text-center">2.</td>
						<td>Nama / NIP Pegawai yang diperintahkan</td>
						<td><?php echo $hasil->nama_pegawai.' / ' .$hasil->nip; ?></td>
					</tr>
					<tr>
						<td class="text-center">3.</td>
						<td>
							a. Pangkat dan Golongan ruang gaji menurut PP No. 6 Tahun 1997<br/>
							b. Jabatan Instansi<br/>
							c. Tingkat menurut perjalanan dinas
						</td>
						<td>
							a. <?php echo $this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil2->id_pangkat)->uraian.' / ' .$this->Admin_m->detail_data_order('master_golongan','id_golongan',$hasil2->id_pangkat)->golongan; ?><br/>
							b. <?php echo $this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$hasil2->id_jabatan)->nama_jabatan; ?><br/>
							c. <?php echo$this->Admin_m->detail_data_order('master_jenis_perjadin','id_jenis_perjadin',$hasil2->id_jenis_perjadin)->jenis_perjadin; ?>
						</td>
					</tr>
					<tr>
						<td class="text-center">4.</td>
						<td>Maksud perjalanan dinas</td>
						<td><?php echo $hasil2->keperluan; ?></td>
					</tr>
					<tr>
						<td class="text-center">.</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td class="text-center">5.</td>
						<td>Alat angkutan yang dipergunakan</td>
						<td><?php echo $hasil2->alat_transportasi; ?></td>
					</tr>
					<tr>
						<td class="text-center">6.</td>
						<td>
							a. Tempat berangkat<br/>
							b. Tempat Tujuan
						</td>
						<td>
							a. <?php echo $hasil2->tujuan_ta; ?><br/>
							b. <?php echo $hasil2->tujuan_ta; ?>
						</td>
					</tr>
					<tr>
						<td class="text-center">7.</td>
						<td>
							a. Lamanya perjalanan dinas<br/>
							b. Tanggal berangkat<br/>
							c. Tanggal harus kembali / tiba di tempat baru
						</td>
						<td>
							a. <?php echo $hasil2->lama_hari; ?> (hari)<br/>
							b. <?php echo $hasil2->tgl_berangkat; ?><br/>
							c. <?php echo $hasil2->tgl_kembali; ?>
						</td>
					</tr>
					<tr>
						<td class="text-center">8.</td>
						<td>
							Pembebanan Anggaran<br/>
							a. Instansi<br/>
							b. Mata Anggaran
						</td>
						<td>
							<br/>
							a. BKPSDM<br/>
							b. <?php echo $hasil2->kd_anggaran; ?>
						</td>
					</tr>
					<tr>
						<td class="text-center">9.</td>
						<td>Keterangan Lain-Lain</td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>