<body class="skin-blue fixed-layout">
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
	<div id="main-wrapper">
		<!-- ============================================================== -->
		<!-- Topbar header - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<header class="topbar">
			<nav class="navbar top-navbar navbar-expand-md navbar-dark">
				<!-- ============================================================== -->
				<!-- Logo -->
				<!-- ============================================================== -->
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo base_url();?>C_pusat/index">
						<!-- Logo icon --><b>
							<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
							<!-- Dark Logo icon -->
							<img src="<?php echo base_url();?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
							<!-- Light Logo icon -->
							<img src="<?php echo base_url();?>assets/images/logo-polri.png" alt="homepage" class="light-logo" />
						</b>
						<!--End Logo icon -->
						<!-- Logo text --><span>
							<!-- dark Logo text -->
							<img src="<?php echo base_url();?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
							<!-- Light Logo text -->
							<img src="<?php echo base_url();?>assets/images/POLRI.png" style="width:110px" class="light-logo mt-2" alt="homepage" /></span>
					</a>
				</div>
				<!-- ============================================================== -->
				<!-- End Logo -->
				<!-- ============================================================== -->
				<div class="navbar-collapse">
					<!-- ============================================================== -->
					<!-- toggle and nav items -->
					<!-- ============================================================== -->
					<ul class="navbar-nav mr-auto">
						<!-- This is  -->
						<li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i
								 class="ti-menu"></i></a> </li>
						<li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
							 href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
						<!-- ============================================================== -->
						<!-- Search -->
						<!-- ============================================================== -->
						<li class="nav-item">
							<form class="app-search d-none d-md-block d-lg-block">
								<input type="text" class="form-control" placeholder="Search & enter">
							</form>
						</li>
					</ul>
					<!-- ============================================================== -->
					<!-- User profile and search -->
					<!-- ============================================================== -->
					<ul class="navbar-nav my-lg-0">
						<!-- ============================================================== -->
						<!-- Comment -->
						<!-- ============================================================== -->
						<li class="nav-item dropdown u-pro">
							<a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown"
							 aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url();?>assets/images/users/1.jpg" alt="user"
								 class=""> <span class="hidden-md-down">
									<?php echo $this->session->userdata('email');?><i class="fa fa-angle-down"></i></span> </a>
							<div class="dropdown-menu dropdown-menu-right animated flipInY">
								<!-- text-->
								<a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
								<!-- text-->
								<div class="dropdown-divider"></div>
								<!-- text-->
								<a href="<?php echo base_url();?>C_login/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
								<!-- text-->
							</div>
						</li>
						<!-- ============================================================== -->
						<!-- End User Profile -->
						<!-- ============================================================== -->
						<li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i
								 class="ti-settings"></i></a></li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- ============================================================== -->
		<!-- End Topbar header -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Left Sidebar - style you can find in sidebar.scss  -->
		<!-- ============================================================== -->
		<aside class="left-sidebar">
			<!-- Sidebar scroll-->
			<div class="scroll-sidebar">
				<!-- Sidebar navigation-->
				<nav class="sidebar-nav">
					<ul id="sidebarnav">
						<li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img
								 src="<?php echo base_url();?>assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu">
									<?php echo $this->session->userdata('email');?></span></a>
							<ul aria-expanded="false" class="collapse">
								<li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
								<li><a href="<?php echo base_url();?>C_login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
							</ul>
						</li>
						<li class="nav-small-cap">--- Kepolisian Negara Republik Indonesia</li>
						<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-university"></i><span
								 class="hide-menu">Data Polri <span class="badge badge-pill badge-cyan ml-auto"></span></span></a>
							<ul aria-expanded="false" class="collapse">
								<li><a href="<?php echo base_url();?>C_pusat/getPolda">Polda </a></li>
								<li><a href="<?php echo base_url();?>C_pusat/getPolres">Polres</a></li>
								<li><a href="<?php echo base_url();?>C_pusat/getPolsek">Polsek</a></li>
							</ul>
						</li>
						<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-paperclip"></i><span
								 class="hide-menu">Laporan</span></a>
							<ul aria-expanded="false" class="collapse">
								<li><a href="<?php echo base_url();?>C_pusat/getLaporanProgram">Program</a></li>
								<li><a href="<?php echo base_url();?>C_pusat/getLaporanKegiatan">Kegiatan</a></li>
								<li><a href="<?php echo base_url();?>C_pusat/getLaporanOutput">Output</a></li>
							</ul>
						</li>

					</ul>
				</nav>
				<!-- End Sidebar navigation -->
			</div>
			<!-- End Sidebar scroll-->
		</aside>
		<!-- ============================================================== -->
		<!-- End Left Sidebar - style you can find in sidebar.scss  -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Page wrapper  -->
		<!-- ============================================================== -->
		<div class="page-wrapper">
			<!-- ============================================================== -->
			<!-- Container fluid  -->
			<!-- ============================================================== -->
			<div class="container-fluid">
				<!-- ============================================================== -->
				<!-- Bread crumb and right sidebar toggle -->
				<!-- ============================================================== -->
				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h4 class="text-themecolor">Dashboard 1</h4>
					</div>
					<div class="col-md-7 align-self-center text-right">
						<div class="d-flex justify-content-end align-items-center">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
								<li class="breadcrumb-item active">Dashboard 1</li>
							</ol>
							<button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
						</div>
					</div>
				</div>
				<!-- ============================================================== -->
				<!-- End Bread crumb and right sidebar toggle -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- Info box -->
				<!-- ============================================================== -->
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Data Export</h4>
								<button type="button" class="btn btn-info d-none d-lg-block" onclick='add_data()' data-toggle="modal"
								 data-target="#modalTambah"><i class="fa fa-plus-circle"></i> Tambah Data</button>
								<div class="table-responsive m-t-10">
									<table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
									 width="100%">
										<thead>
											<tr>
												<th> No </th>
												<th>Kode Kegiatan</th>
												<th>Nama Kegiatan</th>
												<!-- <th>Kode Output</th>
												<th>Nama Output</th> -->
												<th>Amount</th>
												<th width="150px;"> Aksi </th>
											</tr>
										</thead>

										<tbody id="myForm">
											<?php 
                                        $no=1;
                                        foreach($kegiatan as $val){?>
											<tr>
												<td align="center">
													<?php echo $no++;?>
												</td>
												<td align="center">
													<?php echo $val->kode_kegiatan;?>
												</td>
												<td>
													<?php echo $val->nama_kegiatan;?>
												</td>
								
												<td>
													<?php echo "Rp. ".number_format($val->amount_kegiatan);?>
												</td>
												 

												<td>
													<button class='btn btn-info' onclick="edit_data(<?php echo $val->id_kegiatan;?>)"><i class='fa fa-edit' aria-hidden='true'></i>Edit</button>
													<button class="btn btn-danger" onclick="delete_data(<?php echo $val->id_kegiatan;?>)"><i class="fa fa-trash"
														 aria-hidden="true"></i>Hapus</button>
												</td>
											</tr>
										</tbody>
										<?php }?>
									</table>

								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal Tambah -->
				<form id="form">
					<div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
					 aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content block3">
								<div class="alert alert-danger print-error-msg" style="display:none">
								</div>
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Kode Program</label>
										<div class="col-md-10">
											<select name="kode_program" id="kode_program" class="form-control" onchange="auto_complete()">
											<option value="pilih" selected='selected'>--Pilih Kode Program--</option>
												<?php 
                                            foreach($kode_program as $val){?>
												<option value="<?php echo $val->id_program;?>">
													<?php echo $val->kode_program;?>
												</option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Program</label>
										<div class="col-md-10">
											<input type="text" name="program" id="program" class="form-control" placeholder="Program" readonly>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Kode Kegiatan</label>
										<div class="col-md-10">
											<input type="text" name="kode_kegiatan" id="kode_kegiatan" class="form-control" placeholder="Kode Kegiatan">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Nama Kegiatan</label>
										<div class="col-md-10">
											<input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan">
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Amount</label>
										<div class="col-md-10">
											<input type="text" name="amount_kegiatan" id="amount_kegiatan" class="form-control" placeholder="Amount">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<input type="hidden" name="id_kegiatan" id="id_kegiatan">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" type="submit" onclick="save_data()" id="tambahData" class="btn btn-info">Save</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!--END MODAL Tambah-->
				<!--END MODAL Edit-->
				<!-- ============================================================== -->
				<!-- End Info box -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- Over Visitor, Our income , slaes different and  sales prediction -->
				<!-- ============================================================== -->
				<!-- Right sidebar -->
				<!-- ============================================================== -->
				<!-- .right-sidebar -->
				<div class="right-sidebar">
					<div class="slimscrollright">
						<div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
						<div class="r-panel-body">
							<ul id="themecolors" class="m-t-20">
								<li><b>With Light sidebar</b></li>
								<li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
								<li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
								<li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
								<li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
								<li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
								<li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
								<li class="d-block m-t-30"><b>With Dark sidebar</b></li>
								<li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
								<li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
								<li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
								<li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
								<li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
								<li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
							</ul>

						</div>
					</div>
				</div>
				<!-- ============================================================== -->
				<!-- End Right sidebar -->
				<!-- ============================================================== -->


			</div>
			<!-- ============================================================== -->
			<!-- End Container fluid  -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Page wrapper  -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- footer -->
		<!-- ============================================================== -->
		<footer class="footer">
			© 2018 Eliteadmin by themedesigner.in
		</footer>
		<!-- ============================================================== -->
		<!-- End footer -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="<?php echo base_url();?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap popper Core JavaScript -->
	<script src="<?php echo base_url();?>assets/node_modules/popper/popper.min.js"></script>
	<script src="<?php echo base_url();?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="<?php echo base_url();?>dist/js/perfect-scrollbar.jquery.min.js"></script>
	<!--Wave Effects -->
	<script src="<?php echo base_url();?>dist/js/waves.js"></script>
	<!--Menu sidebar -->
	<script src="<?php echo base_url();?>dist/js/sidebarmenu.js"></script>
	<!--Custom JavaScript -->
	<script src="<?php echo base_url();?>dist/js/custom.min.js"></script>
	<!-- ============================================================== -->
	<!-- This page plugins -->
	<!-- ============================================================== -->
	<!--morris JavaScript -->
	<script src="<?php echo base_url();?>assets/node_modules/raphael/raphael-min.js"></script>
	<script src="<?php echo base_url();?>assets/node_modules/morrisjs/morris.min.js"></script>
	<script src="<?php echo base_url();?>assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
	<!-- Popup message jquery -->
	<script src="<?php echo base_url();?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
	<!-- Chart JS -->
	<script src="<?php echo base_url();?>dist/js/dashboard1.js"></script>
	<script src="<?php echo base_url();?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
	<!-- Data Table -->
	<script src="<?php echo base_url();?>assets/node_modules/datatables/jquery.dataTables.min.js"></script>
	<!-- sweet alert -->
	<script src="<?php echo base_url();?>assets/node_modules/sweetalert/sweetalert.min.js"></script>
	<!-- js mask rupiah-->
	<script src="<?php echo base_url();?>assets/node_modules/mask/jquery.mask.js"></script>

	<script>
		$(document).ready(function () {
			$('#myTable').DataTable();
			// $('#amount').mask('000.000.000.000.000', {reverse: true});
		});


		var save_method;
		var table;

		function add_data() {
			save_method = 'add';
			$('#form')[0].reset();
			$('#form-modal').modal('show');
		}

		function save_data() {
			var url;

			if (save_method == 'add') {
				url = '<?php echo base_url();?>C_pusat/tambahLaporanKegiatan';
			} else {
				url = '<?php echo base_url();?>C_pusat/updateLaporanKegiatan';
			}
			$.ajax({
				url: url,
				type: 'POST',
				data: $('#form').serialize(),
				dataType: 'JSON',
				success: function (data) {
					$('#form-modal').modal('hide');
					// console.log(data);
					// swal('Berhasil','Berhasil Menambahkan Data','Success');
					// alert('berhasil');
					location.reload();
				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert('Gagal Tambah Data');
				}
			});
		}

		function edit_data(id_kegiatan) {
			save_method = 'update';
			$('#form')[0].reset();

			$.ajax({
				url: "<?php echo base_url();?>C_pusat/editLaporanKegiatan/" + id_kegiatan,
				type: 'GET',
				dataType: 'JSON',
				success: function (data) {
					$('[name="id_kegiatan"]').val(data.id_kegiatan);
					$('[name="kode_program"]').val(data.id_program);
					$('[name="program"]').val(data.program);
					$('[name="kode_kegiatan"]').val(data.kode_kegiatan);
					$('[name="nama_kegiatan"]').val(data.nama_kegiatan);
					$('[name="amount_kegiatan"]').val(data.amount_kegiatan);
					$('#form-modal').modal('show');
					$('.modal-title').text('Edit Data');

				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert('error');
				}
			});
		}

		function delete_data(id_kegiatan) {
			if (confirm('Apakah Yakin Ingin Hapus Data Ini?')) {

				$.ajax({
					url: '<?php echo base_url();?>C_pusat/deleteLaporanKegiatan/' + id_kegiatan,
					type: 'POST',
					dataType: 'JSON',
					success: function (data) {
						location.reload();
					},
					error: function (jqXHR, textStatus, errorThrown) {
						alert('Gagal Menghapus Data');
					}
				});
			}
		}

		function auto_complete() {
			var kode_program = $('#kode_program').val();

			$.ajax({
				url: '<?php echo base_url();?>C_pusat/getNamaProgram',
				data: {
					kode_program: kode_program
				},
				type: 'POST',
				dataType: 'JSON',
				success: function (data) {
					console.log(data[0].program);

					$('#program').val(data[0].program);
					// $('#amount').val(data[0].amount);
				}
			});
		}
		function auto() {
			var kode_output = $('#kode_output').val();

			$.ajax({
				url: '<?php echo base_url();?>C_pusat/getNamaOutput',
				data: {
					kode_output: kode_output
				},
				type: 'POST',
				dataType: 'JSON',
				success: function (data) {
					console.log(data[0].nama_output);

					$('#nama_output').val(data[0].nama_output);
					// $('#amount').val(data[0].amount);
				}
			});
		}

	</script>
</body>

</html>
