<script type="text/javascript">

        function validatePass(p1, p2) {
            if (p1.value != p2.value || p1.value == '' || p2.value == '') {
                p2.setCustomValidity('Password do not match');
            } else {
                p2.setCustomValidity('');
            }
        }


</script>

<div id="rootwizard">
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<ul>
					<li><a href="#tab1" data-toggle="tab">First</a></li>
					<li><a href="#tab2" data-toggle="tab">Second</a></li>
					<li><a href="#tab3" data-toggle="tab">Third</a></li>
					<li><a href="#tab4" data-toggle="tab">Forth</a></li>
					<li><a href="#tab5" data-toggle="tab">Fifth</a></li>
					<li><a href="#tab6" data-toggle="tab">Sixth</a></li>
					<li><a href="#tab7" data-toggle="tab">Seventh</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="tab-content">
		<div class="tab-pane" id="tab1">1</div>
		<div class="tab-pane" id="tab2">2</div>
		<div class="tab-pane" id="tab3">3</div>
		<div class="tab-pane" id="tab4">4</div>
		<div class="tab-pane" id="tab5">5</div>
		<div class="tab-pane" id="tab6">6</div>
		<div class="tab-pane" id="tab7">7</div>
		<div style="float: right">
			<input type='button' class='btn button-next' name='next' value='Next' />
		</div>
		<div style="float: left">
			<input type='button' class='btn button-previous' name='previous'
				value='Previous' />
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<h4 class="section-title">New Member Registration</h4>
		<h4 class="error"><?php if(isset($msg)){ echo $msg; } ?></h4>
		<hr>

	 <?php echo form_open('auth/do_register','class=well'); ?>
	  <div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					<label for="firstname">First Name</label>
		    <?php echo form_error('first_name'); ?>
		    <input type="text" name="first_name" class="form-control"
						placeholder="First Name"
						value="<?php echo set_value('first_name',$this->form_data->first_name); ?>"
						required>
				</div>
				<div class="col-xs-6">
					<label for="lastname">Last Name</label>
		    <?php echo form_error('last_name'); ?>
		    <input type="text" name="last_name" class="form-control"
						placeholder="Last Name"
						value="<?php echo set_value('last_name',$this->form_data->last_name); ?>"
						required>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					<label for="emailaddress">Email Address</label>
		    <?php echo form_error('email_address'); ?>
		    <input type="text" name="email_address" class="form-control"
						placeholder="Email address"
						value="<?php echo set_value('email_address',$this->form_data->email_address); ?>"
						required>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					<label for="password">Password</label>
		    <?php echo form_error('password'); ?>
		     <input type="password" class="form-control" name="password"
						placeholder="Enter Password" id="p1" required>
				</div>
				<div class="col-xs-6">
					<label for="cpassword">Confirm Password</label>
		    <?php echo form_error('cpassword'); ?>
		   <input type="password" class="form-control" name="cpassword"
						placeholder="Confirm your password"
						onfocus="validatePass(document.getElementById('p1'), this);"
						oninput="validatePass(document.getElementById('p1'), this);"
						required>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Create Account</button>
	
	<?php  echo form_close(); ?>
</div>
	<div class="col-md-6 hide">
		<h4>Instructions</h4>
		<hr>
		<div class="row">
			<h4>
				<span class="label label-default">Step 1. </span><br> <br> Fill In
				the Basic Details and Click Create Account.
			</h4>
		</div>
		<div class="row">
			<h4>
				<span class="label label-info">Step 2. </span><br> <br> Confirm
				Account creation using the Link on your Email.
			</h4>
		</div>
		<div class="row">
			<h4>
				<span class="label label-primary">Step 3. </span><br> <br> Log into
				your Account to Complete Registration and attain full Membership.
			</h4>
		</div>
	</div>
</div>
