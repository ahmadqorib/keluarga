<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/style/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-datepicker/css/bootstrap-datepicker.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/datatables/js/jquery.min.js"></script>
</head>
<body>
	<?php echo $_header; ?>
	<div class="container">
		<?php echo $_content; ?>	
	</div>

	<!-- Kanggo modal e keluar -->
	<div class="modal fade" id="modalKeluar">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="text-danger">PERHATIAN!!!</h4>
				</div>
				<div class="modal-body">
					Apakah anda yakin akan keluar ?
				</div>
				<div class="modal-footer">
					<a class="btn btn-danger btn-ok btn-sm" href="<?php echo site_url('Welcome/logout'); ?>">Keluar</a>
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- kanggo modal e hapus -->
	<div class="modal fade" id="modalHapus">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="text-danger">PERHATIAN!!!</h4>
				</div>
				<div class="modal-body">
					Apakah anda yakin akan menghapus data ini ?
				</div>
				<div class="modal-footer">
					<a class="btn btn-danger btn-ok btn-sm">Hapus</a>
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	    $(document).ready(function() {
	        $('#modalHapus').on('show.bs.modal', function(e) {
	            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	        });
	    });
  	</script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>