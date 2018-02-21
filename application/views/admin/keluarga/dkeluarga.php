<div class="panel panel-default panel-detail">
	<div class="panel-heading">
		Data Keluarga Dengan <b>NO KK</b> : <input type="text" value="<?php echo $tampil[0]->no_kk; ?>" disabled="">
		<div style="float: right;">
			<a href="<?php echo site_url('cetak-data-keluarga/'.$tampil[0]->no_kk); ?>" class="btn btn-sm btn-primary" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<table class="tableDetail" width="100%">
					<tr>
						<td width="30%">Nama Kep. Keluarga</td>
						<td width="3%">:</td>
						<td><?php echo $tampil[0]->kepala_keluarga; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $tampil[0]->alamat; ?></td>
					</tr>
					<tr>
						<td>RT / RW</td>
						<td>:</td>
						<td><?php echo $tampil[0]->rt." / ".$tampil[0]->rw; ?></td>
					</tr>
					<tr>
						<td>Desa</td>
						<td>:</td>
						<td><?php echo $tampil[0]->desa; ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-6 col-sm-6">
				<table class="tableDetail" width="100%">
					<tr>
						<td width="20%">Kecamatan</td>
						<td width="3%">:</td>
						<td><?php echo $tampil[0]->kecamatan; ?></td>
					</tr>
					<tr>
						<td>Kabupaten</td>
						<td>:</td>
						<td><?php echo $tampil[0]->kabupaten; ?></td>
					</tr>
					<tr>
						<td>Kode Pos</td>
						<td>:</td>
						<td><?php echo $tampil[0]->kode_pos; ?></td>
					</tr>
					<tr>
						<td>Propinsi</td>
						<td>:</td>
						<td><?php echo $tampil[0]->propinsi; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-responsive" style="margin-top: 5px;">
					<thead>
						<tr>
							<td width="3%">No.</td>
							<td>Nama Lengkap</td>
							<td>NIK</td>
							<td>Jenis Kelamin</td>
							<td>Tempat Lahir</td>
							<td>Tanggal Lahir</td>
							<td>Agama</td>
							<td>Pendidikan</td>
							<td>Pekerjaan</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 0;
							foreach ($anggota as $t) {
								$no++;
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $t->nama; ?></td>
							<td><?php echo $t->nik; ?></td>
							<td><?php echo $t->jk; ?></td>
							<td><?php echo $t->tempat_lahir; ?></td>
							<td><?php echo $t->tanggal_lahir; ?></td>
							<td><?php echo $t->agama; ?></td>
							<td><?php echo $t->pendidikan; ?></td>
							<td><?php echo $t->pekerjaan; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>