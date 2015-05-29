<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ICPAK</title>

    <!-- Bootstrap core CSS -->
   <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />

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


  <div class="container" style="padding:40px;">
  <div class="row">
  	<div class="col-sm-3">
  		<div class="logo"><a href="#"><img src="<?php echo base_url() ?>/assets/img/logo.png" width="150px"></a></div> 
  	</div>
  	<div class="col-sm-6">
  		
  	</div>
  	<div class="col-sm-3">
  	New Member ?
  		<a class="btn-top btn btn-primary" href="<?php echo site_url('auth/signup') ?>">Register </a>
  	</div>
  </div>
     
  <hr>
  </div>
   





<div class="container">
	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	

	a {

		color: #DDB426;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 0 auto;
		
		 
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
		background: none repeat scroll 0 0 #FDFDFD;
    margin-bottom: 20px;
   
    padding: 30px;
    border: 1px solid #DDDDDD;
    border-radius: 7px 7px 7px 7px;
   
	}
	#logo
	{
		text-align: center;
	}


.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;


}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.btn-top
{
	background: -moz-linear-gradient(center top , #FED971 0%, #FEBE4D 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 1px solid #D6982F;
    border-radius: 6px 6px 6px 6px;
    box-shadow: 0 1px 0 0 #FFFFFF inset;
    color: #FFFFFF;
    display: inline-block;
    font: bold 16px Arial,Helvetica,sans-serif;
    padding: 7px 11px;
    text-decoration: none;
    
}

.btn-form
{
	width: 100%;
	height: 50px;
	background: -moz-linear-gradient(center top , #FED971 0%, #FEBE4D 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 1px solid #D6982F;
    border-radius: 6px 6px 6px 6px;
    box-shadow: 0 1px 0 0 #FFFFFF inset;
    color: #FFFFFF;
    display: inline-block;
    font: bold 16px Arial,Helvetica,sans-serif;
    padding: 7px 11px;
    text-decoration: none;
    
}
	</style>

</head>
<body>

<div id="container" style="width:400px; margin-right:auto; margin-left:auto;">

<div id="body">
	
	<?php echo validation_errors('<p class="error">'); ?>
    <?php echo form_open('auth/validate_user','class="form-signin"'); ?>
    <?php if (isset($msg)){echo $msg; }?>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn-form btn btn-primary btn-lg" type="submit">Sign in</button><br><br>
    
    
    <a href="<?php echo site_url('auth/forgot') ?>">Recover Password</a>
	</div>
	
</div>







  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>