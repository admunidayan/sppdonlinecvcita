<div style="margin-top: 14px; background-color: white;padding: 30px">
	<div class="media">
	<div class="media-body">
			<h4>Data Master Biaya Harian</h4>
		</div>
		<div class="media-right">
			<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addmasterbiayaharian"><i class="material-icons">note_add</i> Tambah Data </button>
		</div>
	</div>
	<hr/>
			<table class="table">
				<tr >
					<td>No</td>
					<td>Provinsi</td>
					<td>Jabatan</td>
					<td>Uang Harian</td>
					<td colspan="2">Action</td>
				</tr>
				<?php $no=1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $this->Admin_m->detail_data_order('master_provinsi','id_provinsi',$data->id_provinsi)->nm_provinsi; ?></td>
						<td><?php echo $this->Admin_m->detail_data_order('master_jabatan','id_jabatan',$data->id_jabatan)->nama_jabatan; ?></td>
						<td><?php echo $data->biaya; ?></td>
						<td><a href="<?php echo base_url('index.php/admin/master/edit_biaya_harian/'.$data->id_biaya_harian) ?>">Edit</a></td>
						<td><a href="<?php echo base_url('index.php/admin/master/delete/master_biaya_harian'.$data->id_biaya_harian) ?>">Hapus</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
	<div class="modal fade" id="addmasterbiayaharian" tabindex="-1" role="dialog" aria-labelledby="addmasterbiayaharian" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addmasterlokasipelatihan">Tambah Data Master Biaya Harian</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('index.php/admin/master/create_master_biaya_harian') ?>" method="post">
					<div class="modal-body">
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info">Provinsi</label>
								<select class="form-control" name="id_provinsi">
									<?php foreach ($provinsi as $data): ?>
										<option value="<?php echo $data->id_provinsi ?>"><?php echo $data->nm_provinsi; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="text-info">Jabatan</label>
								<select class="form-control" name="id_jabatan">
									<?php foreach ($jabatan as $data): ?>
										<option value="<?php echo $data->id_jabatan ?>"><?php echo $data->nama_jabatan; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="col-md-12">
								<div class="form-group">
									<label class="text-info" for="biaya">Biaya</label>
									<input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya" >
								</div>
						</div>
					</div>
				<div class="modal-footer">
					<button type="submit" name="submit" value="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
	</div>