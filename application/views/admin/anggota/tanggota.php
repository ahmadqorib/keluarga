<div class="panel panel-default">
	<div class="panel-heading">Tambah Data Anggota Keluarga</div>
	<div class="panel-body">
		<?php $atribut = array('class' => 'form-horizontal' ); ?>
		<?php echo form_open("Anggota/simpan",$atribut); ?>
		<div class="col-md-5">
			<label class="alert alert-info col-md-12">Form Keluarga</label>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3">No KK :</label>
				<div class="col-md-7 col-sm-5">
					<input type="text" class="form-control input-sm"  value="<?php echo $tampil->no_kk; ?>" disabled="">
					<input type="hidden" name="no_kk" class="form-control input-sm"  value="<?php echo $tampil->no_kk; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3">Kepala Keluarga :</label>
				<div class="col-md-7 col-sm-5">
					<input type="text" class="form-control input-sm" disabled=""  value="<?php echo $tampil->kepala_keluarga; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3">Alamat :</label>
				<div class="col-md-7 col-sm-5">
					<textarea class="form-control input-sm" disabled=""><?php echo $tampil->alamat; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3">RT / RW :</label>
				<div class="col-md-7 col-sm-5">
					<input type="text" class="form-control input-sm" disabled="" value="<?php echo $tampil->rt .' / '. $tampil->rw; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3">Desa :</label>
				<div class="col-md-7 col-sm-5">
					<input type="text" class="form-control input-sm" disabled=""  value="<?php echo $tampil->desa; ?>">
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<label class="alert alert-danger col-md-12">Form Anggota Keluarga</label>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3">Nama Lengkap :</label>
				<div class="col-md-5 col-sm-5">
					<input type="text" name="nama" class="form-control input-sm" placeholder="masukkan nama lengkap...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3">NIK :</label>
				<div class="col-md-5 col-sm-5">
					<input type="text" name="nik" class="form-control input-sm" placeholder="masukkan nomor induk kependudukan...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3">Jenis Kelamin :</label>
				<div class="col-md-5 col-sm-5">
					<select class="form-control input-sm" name="jk">
						<option value="">Pilih Jenis Kelamin</option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3">Tempat Lahir :</label>
				<div class="col-md-5 col-sm-5">
					<input type="text" name="tempat" class="form-control input-sm" placeholder="masukkan tempat lahir...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3" for="tanggal">Tanggal Lahir :</label>
				<div class="col-md-5 col-sm-5">
					<input type="text" readonly="" name="tanggal" class="form-control input-sm tanggal" placeholder="masukkan tanggal lahir...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3">Agama :</label>
				<div class="col-md-5 col-sm-5">
					<select class="form-control input-sm" name="agama">
						<option value="">Pilih Agama</option>
						<option value="Islam">Islam</option>
						<option value="Kristen">Kristen</option>
						<option value="Katholik">Katholik</option>
						<option value="Hindu">Hindu</option>
						<option value="Budha">Budha</option>
						<option value="Konghuchu">Konghuchu</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3">Pendidikan :</label>
				<div class="col-md-5 col-sm-5">
					<input type="text" name="pendidikan" class="form-control input-sm" placeholder="masukkan pendidikan...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-sm-3">Pekerjaan :</label>
				<div class="col-md-5 col-sm-5">
					<input type="text" name="pekerjaan" class="form-control input-sm" placeholder="masukkan pekerjaan...">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-10 col-md-offset-2 col-sm-offset-3">
					<a href="<?php echo site_url('adminportal/keluarga');?>" class="btn btn-warning btn-sm">Kembali</a>
					<input type="submit" class="btn btn-primary btn-sm" name="simpan" value="Simpan">
					<input type="reset" class="btn btn-danger btn-sm" value="Reset">
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/style/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/style/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">  
  $('form').validate({
        rules: {
            nama:{
              required:true
            },
            nik:{
              required:true,
              digits:true
            },
            jk:{
              required:true
            },
            tempat:{
              required:true
            },
            tanggal:{
              required:true
            },
            agama:{
              required:true
            },
            pendidikan:{
              required:true
            },
            pekerjaan:{
              required:true
            },
        },
         messages: {
            nama:{
              	required: "<span class='pering'>Nama tidak boleh kosong !!</span>"
            },
            nik:{
              	required: "<span class='pering'>NIK tidak boleh kosong !!</span>",
              	digits: "<span class='pering'>No harus angka !!</span>"
            },
            jk:{
              	required: "<span class='pering'>Jenis Kelamin tidak boleh kosong !!</span>"
            },
            tempat:{
              	required: "<span class='pering'>Tempat tidak boleh kosong !!</span>"
            },
            tanggal:{
              	required: "<span class='pering'>Tanggal tidak boleh kosong !!</span>"
            },
            agama:{
              	required: "<span class='pering'>Agama tidak boleh kosong !!</span>"
            },
            pendidikan:{
              	required: "<span class='pering'>Pendidikan tidak boleh kosong !!</span>"
            },
            pekerjaan:{
              	required: "<span class='pering'>Pekerjaan tidak boleh kosong !!</span>"
            },
         }
    });
</script>

<!-- fungsi js yang digunakan untuk datepicker -->
<script type="text/javascript">
	$(document).ready(function(){
		$('.tanggal').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true
		});
	});
</script>

<!-- but pertanyaan nambah anggota -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="text-danger"></h4>
			</div>
			<div class="modal-body">
				Apakah anda akan menambahkan anggota keluarga lagi ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Ya</button>
				<a href="<?php echo site_url('adminportal/keluarga'); ?>" class="btn btn-danger btn-sm">Tidak</a>
			</div>
		</div>
	</div>
</div>

<?php if($this->session->flashdata('proses')=="berhasil"){ ?>
	<script type="text/javascript">		
		$(document).ready(function() {
	        $("#myModal").modal("show");
	    });
	</script>
<?php } ?>
