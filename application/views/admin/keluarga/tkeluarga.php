<div class="panel panel-default">
	<div class="panel-heading">Tambah Data Keluarga</div>
	<div class="panel-body">
		<?php $atribut = array('class' => 'form-horizontal' ); ?>
		<?php echo form_open('Keluarga/simpan',$atribut); ?>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-3">No KK :</label>
				<div class="col-md-4 col-sm-5">
					<input type="text" name="no" class="form-control input-sm" placeholder="masukkan no kk...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-3">Kepala Keluarga :</label>
				<div class="col-md-4 col-sm-5">
					<input type="text" name="nama" class="form-control input-sm" placeholder="masukkan nama kepala keluarga...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-3">Alamat :</label>
				<div class="col-md-4 col-sm-5">
					<textarea name="alamat" class="form-control input-sm" placeholder="masukkan alamat..."></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-3">RT :</label>
				<div class="col-md-4 col-sm-5">
					<input type="text" name="rt" class="form-control input-sm" placeholder="masukkan RT...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-3">RW :</label>
				<div class="col-md-4 col-sm-5">
					<input type="text" name="rw" class="form-control input-sm" placeholder="masukkan RW...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-3">Desa :</label>
				<div class="col-md-4 col-sm-5">
					<input type="text" name="desa" class="form-control input-sm" placeholder="masukkan desa...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-3">Kecamatan :</label>
				<div class="col-md-4 col-sm-5">
					<input type="text" name="kecamatan" class="form-control input-sm" placeholder="masukkan kecamatan...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-3">Kabupaten :</label>
				<div class="col-md-4 col-sm-5">
					<input type="text" name="kabupaten" class="form-control input-sm" placeholder="masukkan kabupaten...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-3">Kode Pos :</label>
				<div class="col-md-4 col-sm-5">
					<input type="text" name="pos" class="form-control input-sm" placeholder="masukkan kode pos...">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-3">Propinsi :</label>
				<div class="col-md-4 col-sm-5">
					<input type="text" name="propinsi" class="form-control input-sm" placeholder="masukkan propinsi...">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-10 col-md-offset-2 col-sm-offset-3">
					<a href="<?php echo site_url('adminportal/keluarga');?>" class="btn btn-warning btn-sm">Kembali</a>
					<input type="submit" class="btn btn-primary btn-sm" name="simpan" value="Simpan">
					<input type="reset" class="btn btn-danger btn-sm" value="Reset">
				</div>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/style/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/style/jquery.validate.min.js"></script>
<script type="text/javascript">  
  $('form').validate({
        rules: {
            no:{
              required:true,
              digits:true
            },
            nama:{
              required:true
            },
            alamat:{
              required:true
            },
            rt:{
              required:true,
              digits:true
            },
            rw:{
              required:true,
              digits:true
            },
            desa:{
              required:true
            },
            kecamatan:{
              required:true
            },
            kabupaten:{
              required:true
            },
            pos:{
              required:true,
              digits:true
            },
            propinsi:{
              required:true
            },
        },
         messages: {
            no:{
              	required: "<span class='pering'>No KK tidak boleh kosong !!</span>",
              	digits: "<span class='pering'>No harus angka !!</span>"
            },
            nama:{
              	required: "<span class='pering'>Nama tidak boleh kosong !!</span>"
            },
            alamat:{
              	required: "<span class='pering'>Alamat tidak boleh kosong !!</span>"
            },
            rt:{
              	required: "<span class='pering'>RT tidak boleh kosong !!</span>",
              	digits: "<span class='pering'>RT harus angka !!</span>"
            },
            rw:{
              	required: "<span class='pering'>RW tidak boleh kosong !!</span>",
              	digits: "<span class='pering'>RW harus angka !!</span>"
            },
            desa:{
              	required: "<span class='pering'>Desa tidak boleh kosong !!</span>"
            },
            kecamatan:{
              	required: "<span class='pering'>Kecamatan tidak boleh kosong !!</span>"
            },
            kabupaten:{
              	required: "<span class='pering'>Kabupaten tidak boleh kosong !!</span>"
            },
            pos:{
              	required: "<span class='pering'>Kode pos tidak boleh kosong !!</span>",
              	digits: "<span class='pering'>Kode pos harus angka !!</span>"
            },
            propinsi:{
              	required: "<span class='pering'>Propinsi tidak boleh kosong !!</span>"
            },
         }
    });
</script>