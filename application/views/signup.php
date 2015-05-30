<script type="text/javascript">

        function validatePass(p1, p2) {
            if (p1.value != p2.value || p1.value == '' || p2.value == '') {
                p2.setCustomValidity('Password do not match');
            } else {
                p2.setCustomValidity('');
            }
        }


</script>

<div class="image-container set-full-height"
	style="background-image: url('<?php echo base_url();?>assets/img/wizard-city.jpg')">

	<!--   Big container   -->
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">

				<!--      Wizard container        -->
				<div class="wizard-container">
					<form action="" method="">
						<div class="card wizard-card ct-wizard-green" id="wizard">

							<!--        You can switch "ct-wizard-azzure"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->

							<div class="wizard-header">
								<h3>New Member Registration</h3>
							</div>
							<ul>
								<li><a href="#location" data-toggle="tab">1. Personal
										Information</a></li>
								<li><a href="#type" data-toggle="tab">2. Confirm Package</a></li>
								<li><a href=#payment data-toggle="tab">3.Payment</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane" id="location">
									<div class="row">
										<div class="alert alert-success" role="alert">
											<strong>Success!</strong> An email has been sent to your
											email Address containing the Proforma Invoice to validate
											your payment.
										</div>

										<div class="col-sm-12">
											<h4 class="info-text">Fill In Below Details:</h4>
										</div>
										<div class="col-md-12">
											<h4 class="section-title"></h4>
											<h4 class="error"><?php if(isset($msg)){ echo $msg; } ?></h4>
											<hr>
	 												<?php echo form_open('auth/do_register','class=well'); ?>
												  <div class="form-group">
												<div class="row">
													<div class="col-xs-6">
														<label for="firstname">First Name</label>
		    												<?php echo form_error('first_name'); ?>
		    												<input type="text" name="first_name"
															class="form-control" placeholder="First Name"
															value="<?php echo set_value('first_name',$this->form_data->first_name); ?>"
															required>
													</div>
													<div class="col-xs-6">
														<label for="lastname">Last Name</label>
														    <?php echo form_error('last_name'); ?>
														    <input type="text" name="last_name"
															class="form-control" placeholder="Last Name"
															value="<?php echo set_value('last_name',$this->form_data->last_name); ?>"
															required>
													</div>
												</div>

												<div class="form-group">
													<div class="row">
														<div class="col-xs-6">
															<label for="emailaddress">Email Address</label>
		   													 <?php echo form_error('email_address'); ?>
		   													 <input type="text" name="email_address"
																class="form-control" placeholder="Email address"
																value="<?php echo set_value('email_address',$this->form_data->email_address); ?>"
																required>
														</div>

														<div class="col-xs-6">
															<label for="applicationCategory">Category:</label> 
															<select name="membercategory" class="form-control">
																<option disabled="" selected="">- Select Category -</option>
																<option value="1">Non-Practising (Kes 10,000)</option>
																<option value="2">Practising (Kes 15,000)</option>
																<option value="3">Overseas (Kes 20,000)</option>
																<option value="4">Associate (Kes 25,000)</option>
															</select>
														</div>
													</div>
												</div>


												<div class="form-group">
													<div class="row">
														<div class="col-xs-6">
															<label for="emailaddress">Employer</label>
		   													 <?php echo form_error('email_address'); ?>
		   													 <input type="text" name="email_address"
																class="form-control" placeholder="Email address"
																value="<?php echo set_value('email_address',$this->form_data->email_address); ?>"
																required>
														</div>

														<div class="col-xs-6">
															<label for="applicationCategory">Town/City</label>
															
															<?php echo form_error('email_address'); ?>
		   													 <input type="text" name="email_address"
																class="form-control" placeholder="Email address"
																value="<?php echo set_value('email_address',$this->form_data->email_address); ?>"
																required>
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row">
														<div class="col-xs-6">
															<label for="emailaddress">Employer</label>
		   													 <?php echo form_error('email_address'); ?>
		   													 <input type="text" name="email_address"
																class="form-control" placeholder="Email address"
																value="<?php echo set_value('email_address',$this->form_data->email_address); ?>"
																required>
														</div>

														<div class="col-xs-6">
															<label for="applicationCategory">Town/City</label>
															
															<?php echo form_error('email_address'); ?>
		   													 <input type="text" name="email_address"
																class="form-control" placeholder="Email address"
																value="<?php echo set_value('email_address',$this->form_data->email_address); ?>"
																required>
														</div>
													</div>
												</div>

												<div class="form-group hide">
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
	
									<?php  echo form_close(); ?>
									</div>
										</div>


									</div>
								</div>
								<div class="tab-pane" id="type">
									<h4 class="info-text">You have Selected below Package:</h4>
									<div class="row">
										<div class="col-md-12" style="margin-top: 20px;">
											<div class="pricing-table">
												<div class="panel panel-primary" style="border: none;">
													<div
														class="controle-header panel-heading panel-heading-landing">
														<h1 class="panel-title panel-title-landing">Non-Practicing
															Member</h1>
													</div>

													<div class="panel-body panel-body-landing">
														<table class="table">
															<tr>
																<td width="50px"><i class="fa fa-check"></i></td>
																<td>Application Fee: Kshs.26,000</td>
															</tr>
															<tr>
																<td width="50px"><i class="fa fa-check"></i></td>
																<td>Annual subscription: Kshs 10,000</td>
															</tr>
															<tr>
																<td width="50px"><i class="fa fa-check"></i></td>
																<td>All CPA graduates who have experience of 3 years or
																	more</td>
															</tr>
														</table>
													</div>
													<div class="panel-footer panel-footer-landing"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="payment">
									<div class="row">
										<iframe
											src="http://197.248.4.221:8080/ewallet/#websiteClient;businessNo=722722;accountNo=Null;orgName=ICPAK;amount=5857;refId=10"
											width="100%" height="620px" scrolling="no" frameborder="0">
											&lt;p&gt;Browser unable to load iFrame&lt;/p&gt; </iframe>
									</div>
								</div>
								<div class="tab-pane" id="description">
									<div class="row"></div>
								</div>
							</div>
							<div class="wizard-footer">
								<div class="pull-right">
									<input type='button'
										class='btn btn-next btn-fill btn-success btn-wd btn-sm'
										name='next' value='Next' /> <input type='button'
										class='btn btn-finish btn-fill btn-success btn-wd btn-sm'
										name='finish' value='Finish' />

								</div>
								<div class="pull-left">
									<input type='button'
										class='btn btn-previous btn-fill btn-default btn-wd btn-sm'
										name='previous' value='Previous' />
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</form>
				</div>
				<!-- wizard container -->
			</div>
		</div>
		<!-- row -->
	</div>
	<!--  big container -->
