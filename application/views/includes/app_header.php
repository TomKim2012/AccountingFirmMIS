<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.png">

<title>ICPAK Portal</title>

<!-- Bootstrap core CSS -->
<link type="text/css" rel="stylesheet"
	href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

<link href="<?php echo base_url()?>assets/css/pricing-table.css"
	rel="stylesheet" />

<link href="<?php echo base_url()?>assets/css/app.css" rel="stylesheet" />
<link href="<?php echo base_url()?>assets/css/simple-line-icons.css"
	rel="stylesheet" />
<link href="<?php echo base_url()?>assets/css/weather-icons.min.css"
	rel="stylesheet" />

<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css"
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
	<div data-ui-view="" data-autoscroll="false" class="wrapper ng-scope">
		<!-- top navbar-->
		<header ng-include="'app/views/partials/top-navbar.html'"
			class="topnavbar-wrapper ng-scope">
			<!-- START Top Navbar-->
			<nav role="navigation" class="navbar topnavbar ng-scope">
				<!-- START navbar header-->
				<div class="navbar-header">
					<a href="#/" class="navbar-brand">
						<div class="brand-logo">
							<img src="<?php echo base_url() ?>/assets/img/logo.png"
								width="30px" class="img-responsive">
						</div>
						<div class="brand-logo-collapsed">
							<img src="<?php echo base_url() ?>/assets/img/logo.png"
								class="img-responsive">
						</div>
					</a>
				</div>
				<!-- END navbar header-->

				<!-- START Nav wrapper-->
				<div class="nav-wrapper">
					<!-- START Left navbar-->
					<ul class="nav navbar-nav">
						<li>
							<!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
							<a href="#"
							ng-click="app.layout.isCollapsed = !app.layout.isCollapsed"
							class="hidden-xs"> <em class="fa fa-navicon"></em>
						</a> <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
							<a href="#" toggle-state="aside-toggled" no-persist="no-persist"
							class="visible-xs sidebar-toggle"> <em class="fa fa-navicon"></em>
						</a>
						</li>
						<!-- START User avatar toggle-->
						<li>
							<!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
							<a href="#" ng-click="toggleUserBlock()"> <em class="icon-user"></em>
						</a>
						</li>
						<!-- END User avatar toggle-->
					</ul>
					<!-- END Left navbar-->
					<!-- START Right Navbar-->
					<ul class="nav navbar-nav navbar-right">
						<!-- Search icon-->
						<li class="hide"><a href="#" search-open="search-open"> <em
								class="icon-magnifier"></em>
						</a></li>

						<!-- Fullscreen (only desktops)-->
						<li class="visible-lg"><a href="#"
							toggle-fullscreen="toggle-fullscreen"> <em class="fa fa-expand"></em>
						</a></li>
						<!-- START Alert menu-->
						<li dropdown="" class="dropdown dropdown-list"><a
							dropdown-toggle="" aria-haspopup="true" aria-expanded="false"> <em
								class="icon-bell"></em>
								<div class="label label-danger">11</div>
						</a> <!-- START Dropdown menu-->
							<ul class="dropdown-menu animated flipInX">
								<li>
									<!-- START list group-->
									<div class="list-group">
										<!-- list item-->
										<a href="#" class="list-group-item">
											<div class="media-box">
												<div class="pull-left">
													<em class="fa fa-twitter fa-2x text-info"></em>
												</div>
												<div class="media-box-body clearfix">
													<p class="m0">New followers</p>
													<p class="m0 text-muted">
														<small>1 new follower</small>
													</p>
												</div>
											</div>
										</a>
										<!-- list item-->
										<a href="#" class="list-group-item">
											<div class="media-box">
												<div class="pull-left">
													<em class="fa fa-envelope fa-2x text-warning"></em>
												</div>
												<div class="media-box-body clearfix">
													<p class="m0">New e-mails</p>
													<p class="m0 text-muted">
														<small>You have 10 new emails</small>
													</p>
												</div>
											</div>
										</a>
										<!-- list item-->
										<a href="#" class="list-group-item">
											<div class="media-box">
												<div class="pull-left">
													<em class="fa fa-tasks fa-2x text-success"></em>
												</div>
												<div class="media-box-body clearfix">
													<p class="m0">Pending Tasks</p>
													<p class="m0 text-muted">
														<small>11 pending task</small>
													</p>
												</div>
											</div>
										</a>
										<!-- last list item -->
										<a href="#" class="list-group-item"> <small
											translate="topbar.notification.MORE" class="ng-scope"><span
												class="ng-scope">More notifications</span></small> <span
											class="label label-danger pull-right">14</span>
										</a>
									</div> <!-- END list group-->
								</li>
							</ul> <!-- END Dropdown menu--></li>
						<!-- END Alert menu-->
						<!-- START Contacts button-->
						<li><a href="<?php echo site_url('auth/logout')?>"> <em
								class="fa fa-power-off"></em> LogOut
						</a></li>
						<!-- END Contacts menu-->
					</ul>
					<!-- END Right Navbar-->
				</div>
				<!-- END Nav wrapper-->
				<!-- START Search form-->
				<form role="search" action="search.html"
					class="navbar-form ng-pristine ng-valid hide">
					<div class="form-group has-feedback">
						<input type="text" placeholder="Type and hit enter.."
							class="form-control">
						<div search-dismiss="search-dismiss"
							class="fa fa-times form-control-feedback"></div>
					</div>
					<button type="submit" class="hidden btn btn-default">Submit</button>
				</form>
				<!-- END Search form-->
			</nav>
			<!-- END Top Navbar-->
		</header>