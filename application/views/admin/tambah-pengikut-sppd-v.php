<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
				Daftar Pengikut SPPD<span class="text-secondary"></span>
			</div>
			<div class="media-right">
				<button class="btn btn-outline-success btn-sm text-success" data-toggle="modal" data-target="#adddtpengikut"><i class="material-icons">note_add</i> Tambah pegawai sebagai pengikut</button>
			</div>
		</div>
	</div>
	<div class="ktk-badan bts-ats">
		<?php if ($hasil3 == TRUE): ?>
			<table class="table table-bordered table-hover">
				<thead>
					<tr class="bg-app text-light">
						<td class="jrktbl text-center" align="text-center">No</td>
						<td class="jrktbl" align="center">NIP</td>
						<td class="jrktbl" align="center">Nama Pegawai</td>
						<td class="jrktbl" align="center">Tanggal Lahir</td>
						<td class="jrktbl" align="center">Aksi</td>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1 ?>
					<?php foreach ($hasil3 as $data): ?>
						<tr>
							<td class="jrktbl text-center"><?php echo $no; ?></td>
							<td class="jrktbl text-secondary"><?php echo $data->nip; ?></td>
							<td class="jrktbl text-secondary"><?php echo strtoupper($data->nama_pegawai); ?></td>
							<td class="jrktbl text-secondary"><?php echo $data->tanggal_lahir; ?></td>
							<td class="jrktbl">
								<a href="<?php echo base_url('index.php/admin/pegawai/delete_pengikut_sppd_ld/'.$data->id_pengikut) ?>" class="text-danger">hapus</a>
							</td>
						</tr>
						<?php $no++ ?>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php else: ?>
				<div class="alert alert-info text-center">Tidak ada pengikut pada SPPD ini.</div>
			<?php endif ?>
		</div>
	</div>
	<!--  -->
	<!-- Modal -->
	<form>
		<input type="hidden" id="id_sppd" name="id_sppd" value="<?php echo $hasil2->id_sppd_ld ?>">
	</form>
	<div class="modal fade" id="adddtpengikut" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Cari Pengikut</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Masukan Nama Pegawai</label>
							<input type="text" class="form-control" id="caripegawai" placeholder="Masukan nama atau NIP Pegawai">
							<small class="form-text text-muted">Gunakan NIP atau nama pegawai</small>
						</div>
					</form>
					<table id="hasilcari" width="100%"></table>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
  $('#caripegawai').keyup(function() { // Jika select box id kurir dipilih
  	var katakunci = $('#caripegawai').val();
  	var idsppd = $('#id_sppd').val();
  	$.ajax({
            type: 'post', // Metode pengiriman data menggunakan POST
            url: "<?php echo base_url('index.php/admin/pegawai/caripengikut/'); ?>",
           data: 'string=' + katakunci + '&idsppd='+ idsppd, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
           success: function(jadi) { // Jika berhasil
              $('#hasilcari').html(jadi); // Berikan hasilnya ke id biaya
          }
      });
  });
});
</script>