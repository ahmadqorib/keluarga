<?php if($this->session->flashdata('proses')=='berhasil'){ ?>
		<div class="alert alert-info fade in">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		Data Berhasil Diproses.
		</div>
	
<?php }else if($this->session->flashdata('proses')=='gagal'){ ?>
		<div class="alert alert-danger fade in">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		Data Gagal Diproses.
		</div>
<?php } ?>
<div class="panel panel-default" style="width: auto;">
	<div class="panel-heading">
		Data Keluarga
		<a href="<?php echo site_url('adminportal/keluarga/tambah'); ?>" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
	</div>
	<div class="panel-body">
		<table id="tablee" class="table table-striped table-bordered table-responsive" width="100%">
			<thead>
				<tr>
					<td width="3%">No</td>
					<td width="">No KK</td>
					<td width="">Kepala Keluarga</td>
					<td width="">Alamat</td>
					<td width="">RT / RW</td>
					<td width="">Desa</td>
					<td width="">Kecamatan</td>
					<td width="">Kabupaten</td>
					<td width="">Kode Pos</td>
					<td width="">Propinsi</td>
					<td width="9%">Aksi</td>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">

var table;

$(document).ready(function() {

    //datatables
    table = $('#tablee').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Pages/list_keluarga')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0, 10 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

});

</script>

<script src="<?php echo base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables/js/dataTables.bootstrap.min.js"></script>
