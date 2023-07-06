<?php
		session_start();
		if(!isset($_SESSION['admin_area']))
			header("Location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Area</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>
	<link href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span style="color:white;font-size:24px;font-weight:900;margin-top:0px;padding-top:0px;">Admin Area</span></a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">

			</div>
			<div class="profile-usertitle">
				<div class="row">
					<div class="col-md-4">
						<i class="fa fa-user" style="font-size:45px;color:#0059b3"></i>
					</div>
					<div class="col-md-8">
						<div class="profile-usertitle-name">Admin</div>
						<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>

		<ul class="nav menu">
		<!-- 	<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="Genrate_Code.php"><em class="fa fa-code">&nbsp;</em> Genrate Code</a></li>
			<li><a href="Genrate_Code2.php"><em class="fa fa-code">&nbsp;</em> Genrate Code 2</a></li> -->
		<!-- 	<li><a href="view_analysis.php"><em class="fa fa-cog">&nbsp;</em> Analysis</a></li> -->
		<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Track Items</a></li>
			<li><a href="all_items.php"><em class="fa fa-cog">&nbsp;</em> All Items</a></li>
			<li><a href="admin_classes/logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
