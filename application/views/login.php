<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
		<style type="text/css">
			body, html{
				background-color: #f2f2f2;
			}
			.forme{
				padding: 5px;
			}
			.thumbnail{
				margin-top: 5px;
			}
			.form-group{
				margin-top: -10px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="thumbnail">
						<?php
							if($this->session->flashdata('ket')=='error'){
						?>
							<div class="alert alert-danger">Username dan Password salah !!!</div>
						<?php }else{ ?>
							<div class="alert alert-info">Masukkan Username dan Password !!!</div>
						<?php } ?>
						<?php 
							$atribut = array('class' => "forme");
							echo form_open('Welcome/login', $atribut); 
						?>
							<div class="form-group">
								<label>Username :</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" name="username" class="form-control" placeholder="Masukkan Username ..." value="<?php echo set_value('username'); ?>">
								</div>
								<span class="text-danger"><?php echo form_error('username'); ?></span>
							</div>
							<div class="form-group">
								<label>Password :</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input type="text" name="password" class="form-control" placeholder="Masukkan Password ..." value="<?php echo set_value('password'); ?>">
								</div>
								<span class="text-danger"><?php echo form_error('password'); ?></span>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success">
									<span class="glyphicon glyphicon-ok"></span> Login</button>
								<button type="reset" class="btn btn-danger">
									<span class="glyphicon glyphicon-remove"></span> Reset</button>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>