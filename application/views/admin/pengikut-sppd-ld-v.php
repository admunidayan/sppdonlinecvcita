<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="ktk-jdl">
		<div class="media">
			<div class="media-body">
				Data Pengikut SPPD <span class="text-secondary">Jumlah <?php echo $jmldata; ?></span>
			</div>
			<div class="media-right"></div>
		</div>
	</div>
	<div class="ktk-badan bts-ats">
		<table class="table table-bordered table-hover">
			<thead>
				<tr class="bg-app text-light">
					<td class="jrktbl text-center" align="text-center">No</td>
					<td class="jrktbl" align="center">No SPPD</td>
					<td class="jrktbl" align="center">Pegawai</td>
					<td class="jrktbl" align="center">NIP</td>
					<td class="jrktbl" align="center">Aksi</td>
					
				</tr>
			</thead>
			<tbody>
				<?php $no = 1 ?>
				<?php foreach ($hasil2 as $data): ?>
					<tr>
						<td class="jrktbl text-center"><?php echo $no; ?></td>
						<td class="jrktbl text-secondary"><?php echo $data->nomor; ?></td>
						<td class="jrktbl text-secondary"><?php echo strtoupper($data->nama_pegawai); ?></td>
						<td class="jrktbl text-secondary"><?php echo $data->nip; ?></td>
						<td class="jrktbl">
							<a href="<?php echo base_url('index.php/admin/pegawai/tambah_pengikut_sppd_ld/'.$hasil->id_pegawai.'/'.$data->id_sppd_ld) ?>" class="text-success">Tambah pengikut</a>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php echo $pagging; ?>
	</div>
</div>`