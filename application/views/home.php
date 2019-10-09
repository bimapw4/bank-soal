<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?=base_url("question")?>"><img src="<?=base_url()?>assets/img/logo-dark.png"
						alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i
							class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<?php if ($this->session->userdata('login')==true) {?>
				<div class="navbar-btn navbar-btn-right">
					<a href="#grade" data-toggle="modal" class="btn btn-primary update-pro"><i class="fa fa-rocket">Add
							Grade</i></a>
					<a href="#tambah" data-toggle="modal" class="btn btn-success update-pro"><i class="fa fa-rocket">Add
							Image Question</i></a>
					<a href="<?=base_url("me/logout")?>" class="btn btn-danger">Logout</i></a>
				</div>
				<?php }?>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="<?= base_url('question')?>"
								class="<?= $this->uri->segment(3) == null ? 'active' : ''?>"><i
									class="lnr lnr-home"></i> <span>Home</span></a></li>
							<?php $no=0;foreach ($GetGrade as $Grade):$no++;?>
							<li><a href="<?= base_url('/question/grade/'.$Grade->GradeID)?>"
								class="<?= $this->uri->segment(3) == $Grade->GradeID ? 'active' : ''?>"><i
									class="lnr lnr-home"></i> <span><?=$Grade->title?></span></a></li>
						<?php endforeach?>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

					<!-- modal question -->
					<div class="modal fade" id="tambah">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span
											aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title">Tambah obat</h4>
								</div>
								<div class="modal-body">
									<form action="<?=base_url('/question/PostPicture')?>" method="post"
										enctype="multipart/form-data">
										<table>
											<tr>
												<td>Title</td>
												<td><input type="text" name="title" class="form-control"></td>
											</tr>
											<tr>
												<td>&nbsp</td>
											</tr>
											<tr>
												<td>Grade</td>
												<td><select name="grade" class="form-control">
														<option></option>
														<?php foreach ($GetGrade as $kat): ?>
														<option value="<?=$kat->GradeID?>">
															<?=$kat->title ?></option>
														<?php endforeach ?>
													</select></td>
											</tr>
											<tr>
												<td>&nbsp</td>
											</tr>
											<tr>
												<td>picture</td>
												<td><input type="file" name="gambar" class="form-control"></td>
											</tr>
										</table>
										<br>
										<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

					<!-- modal grade -->
					<div class="modal fade" id="grade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span
											aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title">Tambah obat</h4>
								</div>
								<div class="modal-body">
									<form action="<?=base_url('/question/PostGrade')?>" method="post"
										enctype="multipart/form-data">
										<table>
											<tr>
												<td>Grade </td>
												<td><input type="text" name="grade" class="form-control"></td>
											</tr>
										</table>
										<br>
										<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					<!-- end modal grade -->

					<?php
                        $this->load->view($konten);   
                    ?>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>.
					All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?=base_url()?>assets/scripts/klorofil-common.js"></script>
	<script>
		$(function () {
			var data, options;

			// headline charts
			data = {
				labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
				series: [
					[23, 29, 24, 40, 25, 24, 35],
					[14, 25, 18, 34, 29, 38, 44],
				]
			};

			options = {
				height: 300,
				showArea: true,
				showLine: false,
				showPoint: false,
				fullWidth: true,
				axisX: {
					showGrid: false
				},
				lineSmooth: false,
			};

			new Chartist.Line('#headline-chart', data, options);


			// visits trend charts
			data = {
				labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				series: [{
					name: 'series-real',
					data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
				}, {
					name: 'series-projection',
					data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
				}]
			};

			options = {
				fullWidth: true,
				lineSmooth: false,
				height: "270px",
				low: 0,
				high: 'auto',
				series: {
					'series-projection': {
						showArea: true,
						showPoint: false,
						showLine: false
					},
				},
				axisX: {
					showGrid: false,

				},
				axisY: {
					showGrid: false,
					onlyInteger: true,
					offset: 0,
				},
				chartPadding: {
					left: 20,
					right: 20
				}
			};

			new Chartist.Line('#visits-trends-chart', data, options);


			// visits chart
			data = {
				labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
				series: [
					[6384, 6342, 5437, 2764, 3958, 5068, 7654]
				]
			};

			options = {
				height: 300,
				axisX: {
					showGrid: false
				},
			};

			new Chartist.Bar('#visits-chart', data, options);


			// real-time pie chart
			var sysLoad = $('#system-load').easyPieChart({
				size: 130,
				barColor: function (percent) {
					return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 -
						percent / 100)) + ", 0)";
				},
				trackColor: 'rgba(245, 245, 245, 0.8)',
				scaleColor: false,
				lineWidth: 5,
				lineCap: "square",
				animate: 800
			});

			var updateInterval = 3000; // in milliseconds

			setInterval(function () {
				var randomVal;
				randomVal = getRandomInt(0, 100);

				sysLoad.data('easyPieChart').update(randomVal);
				sysLoad.find('.percent').text(randomVal);
			}, updateInterval);

			function getRandomInt(min, max) {
				return Math.floor(Math.random() * (max - min + 1)) + min;
			}

		});

	</script>
</body>

</html>
