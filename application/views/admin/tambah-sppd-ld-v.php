<form action="<?php echo base_url('index.php/admin/pegawai/create_sppd_ld') ?>" method="post">
	<div style="margin-top: 14px; background-color: white;padding: 30px">
		Tambah SPPD Luar Daerah
	</div>
	<div style="margin-top: 14px; background-color: white;padding: 30px">
		Detail Pegawai<hr/>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Nama Pegawai</label>
					<div class="form-control bg-light"><?php echo $hasil->nama_pegawai ?></div>
					<input type="hidden" name="id_pegawai" value="<?php echo $hasil->id_pegawai ?>">
					<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>NIP</label>
					<div class="form-control bg-light"><?php echo $hasil->nip ?></div>
					<small class="form-text text-muted">hanya boleh menggunakan angka</small>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Golongan</label>
					<div class="form-control bg-light"><?php echo $dtgolongan->golongan ?></div>
					<input type="hidden" name="id_golongan" value="<?php echo $dtgolongan->id_golongan ?>">
					<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
				</div>
			</div>	
			<div class="col">
				<div class="form-group">
					<label>Pangkat</label>
					<div class="form-control bg-light"><?php echo $dtpangkat->nm_pangkat ?></div>
					<input type="hidden" name="id_pangkat" value="<?php echo $dtpangkat->id_pangkat ?>">
					<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
				</div>
			</div>	
			<div class="col">
				<div class="form-group">
					<label>Eselon</label>
					<div class="form-control bg-light"><?php echo $dteselon->nama_eselon ?></div>
					<input type="hidden" name="id_eselon" value="<?php echo $dteselon->id_eselon ?>">
					<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
				</div>
			</div>	
		</div>
	</div>
	<div style="margin-top: 14px; background-color: white;padding: 30px">
		Data SPPD Luar Daerah<hr/>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Nomor Bukti</label>
					<input type="text" class="form-control" name="no_bukti" placeholder="Masukan Nomor Bukti">
					<small class="form-text text-muted">Gunakan Huruf melakukan pengisian ini</small>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label>Tanggal Bukti</label>
					<input type="text" class="form-control" name="tgl_bukti" placeholder="Masukan Tanggal Bukti" value="<?php echo date('Y-m-d') ?>">
					<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Keperluan Perjalanan Dinas</label>
					<textarea class="form-control" name="keperluan" placeholder="Masukan keperluan Perjalanan Dinas"></textarea>
					<small class="form-text text-muted">Maksimal 114 karakter</small>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Kode Anggaran</label>
					<input type="text" class="form-control" name="kd_anggaran" placeholder="Masukan Kode Anggaran">
					<small class="form-text text-muted">Maksimal 114 karakter</small>
				</div>
			</div>
		<!-- <div class="col">
			<div class="form-group">
				<label>Jumlah Bayar</label>
				<input type="text" class="form-control" placeholder="Masukan Jumlah Bayar">
				<small class="form-text text-muted">Maksimal 114 karakter</small>
			</div>
		</div> -->
		<div class="col">
			<div class="form-group">
				<label>Tujuan</label>
				<input type="text" class="form-control" name="tujuan" placeholder="Masukan Tujuan">
				<small class="form-text text-muted">Maksimal 114 karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Tanggal Berangkat</label>
				<input type="text" class="form-control" name="tgl_berangkat" placeholder="Masukan Tanggal Berangkat">
				<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Tanggal Kembali</label>
				<input type="text" class="form-control" name="tgl_kembali" placeholder="Masukan Tanggal Kembali">
				<small class="form-text text-muted">Gunakan format yyyy-mm-dd</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Lama Hari</label>
				<input type="text" class="form-control" name="lama_hari" placeholder="Masukan Lama Hari">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
	</div>
</div>
<div style="margin-top: 14px; background-color: white;padding: 30px">
	Rincian Biaya<hr/>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Provinsi</label>
				<select class="form-control" name="provinsi">
					<option value="1">Pilih Provinsi</option>
					<?php foreach ($provinsi as $data): ?>
						<option value="<?php echo $data->id_provinsi ?>"><?php echo $data->nm_provinsi ?></option>
					<?php endforeach ?>
				</select>
				<small class="form-text text-muted">Pilih salah satu dari data diatas</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Jabatan</label>
				<select class="form-control" name="fjabatan">
					<option value="1">Pilih Jabatan</option>
					<?php foreach ($tjabatan as $data): ?>
						<option value="<?php echo $data->id_jabatan ?>"><?php echo $data->nama_jabatan ?></option>
					<?php endforeach ?>
				</select>
				<small class="form-text text-muted">Pilih salah satu dari data diatas</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Biaya Akomodasi Hotel</label>
				<input type="text" class="form-control" name="akomodasi_hotel" placeholder="Masukan Biaya Akomodasi Hotel">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Biaya Representasi</label>
				<input type="text" class="form-control" name="biaya_representasi" placeholder="Masukan Biaya Representasi">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Biaya Lain/ Kontribusi/ Bantuan Transport</label>
				<input type="text" class="form-control" name="biaya_lain" placeholder="Masukan Biaya Lain/ Kontribusi/ Bantuan Transport">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div>
		<!-- <div class="col">
			<div class="form-group">
				<label>Biaya Tiket PP</label>
				<input type="text" class="form-control" placeholder="Masukan Biaya Tiket PP">
				<small class="form-text text-muted">Hanya Dapat Menggunakan Angka</small>
			</div>
		</div> -->
	</div>
</div>
<div style="margin-top: 14px; background-color: white;padding: 30px">
	Tiket/Akomodasi<hr/>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Nama Penginapan</label>
				<input type="text" class="form-control" name="nama_penginapan" placeholder="Masukan Penginapan">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Tujuan Perjalanan Dinas</label>
				<input type="text" class="form-control" name="tujuan_ta" placeholder="Masukan Tujuan Perjalanan Dinas">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div><hr/>
	<div class="row">
		<div class="col">
			Berangkat<hr/>
			<div class="form-group">
				<label>Tanggal Berangkat</label>
				<input type="text" class="form-control" name="tgl_ta_berangkat" placeholder="Masukan Tanggal Berangkat">
				<small class="form-text text-muted">Gunakan Format YYYY-MM-DD</small>
			</div>
			<div class="form-group">
				<label>Pswt/ KA</label>
				<input type="text" class="form-control" name="pesawat_berangkat" placeholder="Masukan Pswt/ KA">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
			<div class="form-group">
				<label>Nomor Tiket</label>
				<input type="text" class="form-control" name="no_tiket_berangkat" placeholder="Masukan Nomor Tiket">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
			<div class="form-group">
				<label>Kode Booking</label>
				<input type="text" class="form-control" name="kd_book_berangkat" placeholder="Masukan Kode Booking">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
			<div class="form-group">
				<label>Harga (Rp)</label>
				<input type="text" class="form-control" name="harga_berangkat" placeholder="Masukan Harga">
				<small class="form-text text-muted">Gunakan Angka</small>
			</div>
		</div>
		<div class="col">
			Kembali<hr/>
			<div class="form-group">
				<label>Tanggal Kembali</label>
				<input type="text" class="form-control" name="tgl_ta_kembali" placeholder="Masukan Tanggal Kembali">
				<small class="form-text text-muted">Gunakan Format YYYY-MM-DD</small>
			</div>
			<div class="form-group">
				<label>Pswt/ KA</label>
				<input type="text" class="form-control" name="pesawat_kembali" placeholder="Masukan Pswt/ KA">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
			<div class="form-group">
				<label>Nomor Tiket</label>
				<input type="text" class="form-control" name="no_tiket_kembali" placeholder="Masukan Nomor Tiket">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
			<div class="form-group">
				<label>Kode Booking</label>
				<input type="text" class="form-control" name="kd_book_kembali" placeholder="Masukan Kode Booking">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
			<div class="form-group">
				<label>Harga (Rp)</label>
				<input type="text" class="form-control" name="harga_kembali" placeholder="Masukan Harga">
				<small class="form-text text-muted">Gunakan Angka</small>
			</div>
		</div>
	</div>
</div>
<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="form-group">
		<label>Keterangan</label><hr/>
		<textarea class="form-control" name="keterangan" placeholder="Masukan Keterangan"></textarea>
		<small class="form-text text-muted">Maksimal 114 Karakter</small>
	</div>
</div>
<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Nama Angkutan</label>
				<input type="text" class="form-control" name="alat_transportasi" placeholder="Masukan Nama Angkutan">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Uraian Bukti Kas</label>
				<textarea class="form-control" name="uraian_kas" placeholder="Masukan Uraian"></textarea>
				<small class="form-text text-muted">maksimal 3000 karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Volume (OT)</label>
				<input type="text" class="form-control" name="volume_ot" placeholder="Masukan Volume OT">
				<small class="form-text text-muted">Gunakan Angka</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>No Rekening</label>
				<div class="form-control bg-light"><?php echo $hasil->no_rek; ?></div>
				<input type="hidden" name="no_rek" value="<?php echo $hasil->no_rek; ?>">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>	
	</div>
</div>
<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Pejabat Yang Memerintah</label>
				<input type="text" class="form-control" name="pejabat_yang_memerintah" placeholder="Masukan Nama Pejabat">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Pejabat Bertanda tangan</label>
				<input type="text" class="form-control" name="pegawai_ttd" placeholder="Masukan Nama Pejabat">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Jabatan Bertanda Tangan</label>
				<input type="text" class="form-control" name="jabatan_ttd" placeholder="Masukan Jabatan">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label>Tiba Berangkat</label>
				<input type="text" class="form-control" name="tiba_berangkat" placeholder="Masukan Tiba Berangkat">
				<small class="form-text text-muted">Maksimal 114 Karakter</small>
			</div>
		</div>
		<div class="col">
			<input type="radio" name="1">Tidak Di Wakili<br/>
			<input type="radio" name="2">Di Wakili
		</div>
	</div>
	<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan data SPPD</button>
</div>
</form>