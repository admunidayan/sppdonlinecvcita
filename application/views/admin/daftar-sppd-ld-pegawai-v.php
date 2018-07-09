<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
				Data SPPD Luar Daerah <span class="text-secondary">Jumlah <?php echo $jmldata; ?></span>
			</div>
			<div class="media-right">
				<a class="btn btn-outline-success btn-sm" href="<?php echo base_url('index.php/admin/sppd_ld/create') ?>"><i class="material-icons">note_add</i> Tambah data SPPD Luar Daerah</a>
			</div>
		</div>
	</div>
	<div class="ktk-badan bts-ats">
		<form action="<?php echo base_url('index.php/admin/sppd_ld/index/') ?>" method="get">
			<div class="form-group">
				<div class="row">
					<div class="col">
						<input type="text" name="string" class="form-control" placeholder="Masukan Nama, NIP Baru atau NIP Lama">
						<small class="form-text text-muted">Tekan Enter untuk melakukan pencarian honorer</small>
					</div>
				</div>
			</div>
		</form>
		<table class="table table-bordered table-hover">
			<thead>
				<tr class="bg-app text-light">
					<td class="jrktbl text-center">No</td>
					<td class="jrktbl"><i class="material-icons">assignment_ind</i>No. Bukti</td>
					<td class="jrktbl"><i class="material-icons">location_on</i>Nama Pegawai</td>
					<td class="jrktbl"><i class="material-icons">compare_arrows</i>NIP</td>
					<td class="jrktbl"><i class="material-icons">location_on</i>Keperluan</td>
					<td class="jrktbl"><i class="material-icons">lightbulb_outline</i>Tujuan</td>
					<td class="jrktbl"><i class="material-icons">lightbulb_outline</i>Rp</td>
					<td colspan="2" class="jrktbl"><i class="material-icons">lightbulb_outline</i>Aksi</td>
					
				</tr>
			</thead>
			<tbody>
				<?php $no = 1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td class="jrktbl text-center"><?php echo $no; ?></td>
						<td class="jrktbl text-secondary"><?php echo strtoupper($data->nama_pegawai); ?></td>
						<td class="jrktbl text-secondary"><?php echo $data->nip; ?></td>
						<td class="jrktbl text-secondary"><?php echo $data->keperluan; ?></td>
						<td class="jrktbl text-secondary"><?php echo $data->tujuan; ?></td>
						<td class="jrktbl text-secondary"><?php echo $data->jml_bayar; ?></td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/sppd_ld/edit/'.$data->id_sppd_ld) ?>" class="text-success">Edit</a>
						</td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/sppd_ld/delete/'.$data->id_sppd_ld) ?>" class="text-danger">Hapus</a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php echo $pagging; ?>
	</div>
</div>
