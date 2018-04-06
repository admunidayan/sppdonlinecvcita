<div>
	<div class="col-md-2 paddingnone">
		<?php $this->load->view('nav/nav-artikel') ?>
	</div>
	<div class="col-md-10 paddingnone" style="background-color: white">
		<div class="box-panel">
			<div class="media">
				<div class="media-left media-middle">
					<i class="fa fa-plus fa-lg"></i>
				</div>
				<div class="media-body media-middle">
					<h2 class="media-heading"><?php echo $title; ?></h2>
				</div>
			</div>
			<?php if ($this->session->flashdata('errors')): ?>
				<div class="alert alert-danger alert-dismissible" role="alert" style="margin-top:65px;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo $this->session->flashdata('errors');?></strong>
				</div>
			<?php endif ?>
			<?php if ($this->session->flashdata('message')): ?>
				<div class="alert alert-success alert-dismissible" role="alert" style="margin-top:65px;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo $this->session->flashdata('message');?></strong>
				</div>
			<?php endif ?>
			<div class="kotak-daftar">
				<div class="row">
					<div class="col-md-12">
						<h2>bukti pembayaran</h2>
						<?php if ($hasil->konfirm_pembayaran !== 'kosong'): ?>
							<img src="<?php echo base_url('asset/img/konfirmasi/'.$hasil->konfirm_pembayaran); ?>" width="100%">
						<?php else: ?>
							<img src="<?php echo base_url('asset/img/konfirmasi/default.jpg'); ?>" width="100%">
						<?php endif ?>
					</div>
				</div>
			</div>
			<form style="margin-top: 40px;" action="<?php echo base_url('index.php/homepage/input_form_2'); ?>" method="post">
				<div class="col-md-12">
					<h3 class="tengah">"Data Pribadi"</h3>
					<div class="col-md-6">
						<div style="padding: 50px 10px">
							<div>
								<!-- mulai -->
								<div class="form-group bts-ats2">
									<label>Nama Lengkap</label>
									<input type="text" class="form-control" name="nama_mhs" placeholder="Nama calon peserta" value="<?php echo ucwords(strtolower($hasil->nama_mhs));?>">
								</div>
								<div class="form-group bts-ats">
									<label>Email</label>
									<input type="email" class="form-control" name="email_mhs" placeholder="Email" value="<?php echo $hasil->email_mhs ?>">
								</div>
								<div class="form-group bts-ats">
									<label>No HP</label>
									<input type="text" class="form-control" name="no_hp_mhs" placeholder="Nomor Handphone calon peserta" value="<?php echo $hasil->no_hp_mhs ?>">
								</div>
								<div class="form-group bts-ats">
									<label>Gender</label>
									<select class="form-control" name="gender_mhs">
										<option value="L">-- Pilih Gender --</option>
										<option value="L">L</option>
										<option value="P">P</option>
									</select>
								</div>
								<div class="form-group bts-ats">
									<label>Agama</label>
									<select name="id_agama" class="form-control">
										<option value="1">-- Pilih Agama --</option>
										<?php foreach ($listagama as $data): ?>
											<option value="<?php echo $data->id_agama; ?>"><?php echo $data->nm_agama; ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group bts-ats">
									<label>Tanggal Lahir</label>
									<input type="text" class="form-control" name="tgl_lhr_mhs" placeholder="Tanggal Lahir calon peserta" value="<?php echo $hasil->tgl_lhr_mhs ?>">
								</div>
								<div class="form-group bts-ats">
									<label>Tempat Lahir</label>
									<input type="text" class="form-control" name="tmpt_lahir" placeholder="Tempat Lahir" value="<?php echo $hasil->tmpt_lahir ?>">
								</div>
								<div class="form-group bts-ats">
									<label>Telepon Rumah</label>
									<input type="text" class="form-control" name="telepon_rumah" placeholder="Telepon Rumah" value="<?php echo $hasil->telepon_rumah ?>">
								</div>
								<!-- end -->
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div style="padding: 50px 10px">
							<!-- start -->
							<div class="form-group bts-ats2">
								<label>ID KK</label>
								<input type="text" class="form-control" name="id_kk" placeholder="id_kk" value="<?php echo $hasil->id_kk ?>">
							</div>
							<div class="form-group bts-ats">
								<label>RT</label>
								<input type="text" class="form-control" name="rt" placeholder="RT" value="<?php echo $hasil->rt ?>">
							</div>
							<div class="form-group bts-ats">
								<label>RW</label>
								<input type="text" class="form-control" name="rw" placeholder="RW" value="<?php echo $hasil->rw ?>">
							</div>
							<div class="form-group bts-ats">
								<label>Kode POS</label>
								<input type="text" class="form-control" name="kodepost_mhs" placeholder="Kode Pos" value="<?php echo $hasil->kodepost_mhs ?>">
							</div>
							<div class="form-group bts-ats">
								<label>Nama Dusun</label>
								<input type="text" class="form-control" name="nm_dsn" placeholder="Nama Dusun" value="<?php echo $hasil->nm_dsn ?>">
							</div>
							<div class="form-group bts-ats">
								<label>Id Wilayah</label>
								<select class="form-control" name="id_wil">
									<option value="1">-- pilih wilayah --</option>
									<?php foreach ($wilayah as $data): ?>
										<option value="<?php echo $data->id_wil; ?>"><?php echo $data->nm_wil; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group bts-ats">
								<label>Jenis Tinggal</label>
								<select class="form-control" name="id_jns_tinggal">
									<option value="1">-- pilih --</option>
									<?php foreach ($dttgl as $data): ?>
										<option value="<?php echo $data->id_jns_tinggal; ?>"><?php echo $data->nm_jns_tinggal; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group bts-ats">
								<label>Terima KPS</label>
								<input type="text" class="form-control" name="a_terima_kps" placeholder="terima KPS" value="<?php echo $hasil->a_terima_kps ?>">
							</div>
							<!-- end -->
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<h3 class="tengah">"Data Orang Tua"</h3>
					<div class="col-md-6">
						<!-- start -->
						<div class="form-group bts-ats2">
							<label>Nama Ayah</label>
							<input type="text" class="form-control" name="nama_ot_mhs" placeholder="Nama Ayah" value="<?php echo $hasil->nama_ot_mhs ?>">
						</div>
						<div class="form-group bts-ats">
							<label>Pekerjaan Ayah</label>
							<select class="form-control" name="id_pekerjaan_ayah">
							<option value="1">-- pilih pekerjaan --</option>
								<?php foreach ($pekerjaan as $data): ?>
									<option value="<?php echo $data->id_pekerjaan; ?>"><?php echo $data->nm_pekerjaan; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group bts-ats">
							<label>Penghasilan Ayah</label>
							<select class="form-control" name="id_penghasilan_ayah">
								<option value="1">-- Penghasilan Ayah --</option>
								<?php foreach ($penghasilan as $data): ?>
									<option value="<?php echo $data->id_penghasilan; ?>"><?php echo $data->nm_penghasilan; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group bts-ats">
							<label>Pendidikan Terakhir Ayah</label>
							<select class="form-control" name="id_jenjang_pendidikan_ayah">
								<option value="1">-- Pendidikan Ayah --</option>
								<?php foreach ($pendidikan as $data): ?>
									<option value="<?php echo $data->id_jenjang_pend; ?>"><?php echo $data->nama_jenjang_pend; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group bts-ats">
							<label>Tanggal Lahir Ayah</label>
							<input type="text" class="form-control" name="tgl_lahir_ayah" placeholder="Tanggal Lahir" value="<?php echo $hasil->tgl_lahir_ayah ?>">
						</div>
						<!-- end -->
					</div>
					<div class="col-md-6">
						<!-- start -->
						<div class="form-group bts-ats2">
							<label>Nama Ibu</label>
							<input type="text" class="form-control" name="nm_ibu_kandung" placeholder="Nama Ibu" value="<?php echo $hasil->nm_ibu_kandung ?>">
						</div>
						<div class="form-group bts-ats">
							<label>Pekerjaan Ibu</label>
							<select class="form-control" name="id_pekerjaan_ibu">
							<option value="1">-- pilih pekerjaan --</option>
								<?php foreach ($pekerjaan as $data): ?>
									<option value="<?php echo $data->id_pekerjaan; ?>"><?php echo $data->nm_pekerjaan; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group bts-ats">
							<label>Penghasilan Ibu</label>
							<select class="form-control" name="id_penghasilan_ibu">
								<option value="1">-- Penghasilan Ibu --</option>
								<?php foreach ($penghasilan as $data): ?>
									<option value="<?php echo $data->id_penghasilan; ?>"><?php echo $data->nm_penghasilan; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group bts-ats">
							<label>Pendidikan Terakhir Ibu</label>
							<select class="form-control" name="id_jenjang_pendidikan_ibu">
								<option value="1">-- Pendidikan Ibu --</option>
								<?php foreach ($pendidikan as $data): ?>
									<option value="<?php echo $data->id_jenjang_pend; ?>"><?php echo $data->nama_jenjang_pend; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group bts-ats">
							<label>Tanggal Lahir Ibu</label>
							<input type="text" class="form-control" name="tgl_lahir_ibu" placeholder="Tanggal Lahir" value="<?php echo $hasil->tgl_lahir_ibu ?>">
						</div>
						<!-- end -->
					</div>
				</div>
				<div class="col-md-12">
					<h3 class="tengah">"Data Wali"</h3>
					<div class="col-md-6">
						<!-- start -->
						<div class="form-group bts-ats2">
							<label>Nama Wali</label>
							<input type="text" class="form-control" name="nm_wali" placeholder="Nama Wali" value="<?php echo $hasil->nm_wali ?>">
						</div>
						<div class="form-group bts-ats">
							<label>Pekerjaan Wali</label>
							<input type="text" class="form-control" name="id_pekerjaan_wali" placeholder="Pekerjaan Wali" value="<?php echo $hasil->id_pekerjaan_wali ?>">
						</div>
						<div class="form-group bts-ats">
							<label>Penghasilan Wali</label>
							<input type="text" class="form-control" name="id_penghasilan_wali" placeholder="Penghasilan Wali" value="<?php echo $hasil->id_penghasilan_wali ?>">
						</div>
						<div class="form-group bts-ats">
							<label>Pendidikan Terakhir Wali</label>
							<input type="text" class="form-control" name="id_jenjang_pendidikan_wali" placeholder="Pendidiikan Wali" value="<?php echo $hasil->id_jenjang_pendidikan_wali ?>">
						</div>
						<div class="form-group bts-ats">
							<label>Tanggal Lahir Wali</label>
							<input type="text" class="form-control" name="tgl_lahir_wali" placeholder="Tanggal Lahir" value="<?php echo $hasil->tgl_lahir_wali ?>">
						</div>
						<!-- end -->
					</div>
					<button type="submit" value="submit" name="submit" class="btn btn-success bts-ats2" style="width:100%;margin-bottom: 40px;">Simpan</button>
				</div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
</div>