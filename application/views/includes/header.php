<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.png">

<title>ICPAK</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url()?>assets/css/dashboard.css"
	rel="stylesheet" />
<link href="<?php echo base_url()?>assets/css/pricing-table.css"
	rel="stylesheet" />
<link href="<?php echo base_url()?>assets/css/login.css"
	rel="stylesheet" />
<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css"
	rel="stylesheet" />
<link href="<?php echo base_url() ?>assets/css/gsdk-base.css"
	rel="stylesheet" />

<link rel="stylesheet"
	href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<!-- text fonts -->
<link rel="stylesheet"
	href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css" />
<!-- Custom styles for this template -->


<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="../../assets/js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>
	<div>
		<nav class="navbar">
			<div class="container">
				<div class="navbar-header" style="width: 100%; text-align: center;">
					<a href="#" class="brand"><img
						src="<?php echo base_url() ?>/assets/img/logo.png" width="150px"></a>
				</div>
			</div>
		</nav>
		<div class="page-header hide">
			<div class="container">
				<h1><?php if(isset($page_title)){echo $page_title;} ?></h1>
			</div>
		</div>

	</div>