<body class="skin-red-dark card-no-border">
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<div class="loader">
			<div class="loader__figure"></div>
			<p class="loader__label">Elite admin</p>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<section id="wrapper">
		<div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
			<div class="login-box card">
				<div class="card-body">
				<img src="<?php echo base_url();?>assets/images/logo-Iogin.png" style="height:100px; margin-left:120px; margin-bottom:20px;">
					<?php if ($this->session->flashdata('flash')==TRUE){?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>
							<?php echo $this->session->flashdata('flash');?></strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php }  ?>
					<form class="form-horizontal form-material" id="loginform" action="<?php echo base_url();?>C_login/login" method="post">
						<h3 class="box-title m-b-20">Sign In</h3>
						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" placeholder="Email" name="email" id="email"> </div>
							<small id="emailHelp" class="form-text text-danger">
								<?php echo form_error('email');?></small>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" placeholder="Password" name="password" id="password"> </div>
							<small id="emailHelp" class="form-text text-danger">
								<?php echo form_error('password');?></small>
						</div>
						<div class="form-group text-center">
							<div class="col-xs-12 p-b-20">
								<button class="btn btn-block btn-lg btn-info btn-rounded" type="submit" name="login">Log In</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="<?php echo base_url();?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="<?php echo base_url();?>assets/node_modules/popper/popper.min.js"></script>
	<script src="<?php echo base_url();?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<!--Custom JavaScript -->
	<script type="text/javascript">
		$(function () {
			$(".preloader").fadeOut();
		});
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		});
		// ============================================================== 
		// Login and Recover Password 
		// ============================================================== 
		$('#to-recover').on("click", function () {
			$("#loginform").slideUp();
			$("#recoverform").fadeIn();
		});

	</script>

</body>

</html>
