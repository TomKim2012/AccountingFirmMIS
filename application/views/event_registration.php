<script type="text/javascript">
	
	$(document).ready(function(){
	var i=1;
	$("#add_row").click(function(){
	$('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='delagate_regno[]' type='text' placeholder='Registration Number' class='form-control input-md'  /><td><input name='delegate_surname[]' type='text' placeholder='Enter Surname' class='form-control input-md'  /><td><input name='delegate_othernames[]' type='text' placeholder='Enter Other Names' class='form-control input-md'  /><td><input  name='delegate_email[]' type='text' placeholder='Email Address'  class='form-control input-md' />");

	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
	i++; 
	});
	$("#delete_row").click(function(){
	 if(i>1){
	 $("#addr"+(i-1)).html('');
	 i--;
	 }
	});

});
</script>

<div class="row">
	<div class="col-xs-9">
		<div class="row">
			<div class="col-xs-12">
				<a href="<?php echo site_url('application/bookevent/400');?>"
					class="event-title">Financial Reporting Workshop for Cooperative
					Societies.</a>

				<div class="event-info">
					<i>Start Date: </i>14th July 2015 <i> | End Date: </i>19th July
					2015 , <i>Venue: </i> KCA University Plenary Hall.
				</div>
				<div class="event-info">
					<i>CPD Hours: </i> 14 Hours
				</div>
				<div class="event-info">
					<i>Member Price: </i> KES 25,000.00 | Non-member Price: KES
					26,000.00
				</div>

				<div class="col-xs-12">
					<h4 class="section-title">Please fill in the form details below</h4>
					<h4 class="error"><?php if(isset($msg)){ echo $msg; } ?></h4>

					<form class="form-vertical well"
						action="<?php echo site_url("/application/event_registration"); ?>"
						method="POST">
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12">
									<label for="firstname">Company (If self-sponsored, please
										enter: SELF) * </label>
					    <?php echo form_error('company_name'); ?>
					     <input type="hidden" name="event_id"
										value="<?php echo $event_id; ?>" required> <input type="text"
										name="company_name" class="form-control"
										placeholder="Enter Company Name(If self-sponsored, please enter: SELF)"
										value="<?php echo set_value('company_name'); ?>" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-xs-6">
									<label for="emailaddress">Postal Address</label>
					    <?php echo form_error('postal_address'); ?>
					    <input type="text" name="postal_address" class="form-control"
										placeholder="Enter Postal address"
										value="<?php echo set_value('postal_address'); ?>" required>
								</div>
								<div class="col-xs-6">
									<label for="emailaddress">Post Code</label>
					    <?php echo form_error('post_code'); ?>
					    <input type="text" name="post_code" class="form-control"
										placeholder="Enter Postal Code"
										value="<?php echo set_value('post_code'); ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-6">
									<label for="emailaddress">Country</label>
					    <?php echo form_error('country'); ?>
					    <input type="text" name="country" class="form-control"
										placeholder="Enter Country Name"
										value="<?php echo set_value('country'); ?>" required>
								</div>
								<div class="col-xs-6">
									<label for="emailaddress">City</label>
					    <?php echo form_error('city'); ?>
					    <input type="text" name="city" class="form-control"
										placeholder="Enter City Name"
										value="<?php echo set_value('city'); ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-6">
									<label for="emailaddress">Contact person</label>
					    <?php echo form_error('contact_person'); ?>
					    <input type="text" name="contact_person" class="form-control"
										placeholder="If self-sponsored, please enter your name"
										value="<?php echo set_value('contact_person'); ?>" required>
								</div>
								<div class="col-xs-6">
									<label for="emailaddress">Telephone</label>
					    <?php echo form_error('telephone'); ?>
					    <input type="text" name="telephone" class="form-control"
										placeholder="Enter Telephone Number"
										value="<?php echo set_value('telephone'); ?>" required>
								</div>

							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12">
									<label for="emailaddress">Email Address</label>
					    <?php echo form_error('email_address'); ?>
					    <input type="email" name="email_address" class="form-control"
										placeholder="Please enter only 1 (ONE) email address where the proforma invoice will be sent"
										value="<?php echo set_value('email_address'); ?>" required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-xs-6">
									<label for="emailaddress">Payment Mode</label>
					    <?php echo form_error('payment_mode'); ?>
					    <select name="payment_mode" class="form-control" required>
										<option value="cheque">Cheque</option>
										<option value="card">Card</option>
										<option value="mpesa">M-pesa (Paybill 722722)</option>
									</select>
								</div>
								<div class="col-xs-6">
									<label for="emailaddress">Currency</label>
					    <?php echo form_error('currency'); ?>
					   <select name="currency" class="form-control" required>
										<option value="KSH">KSH</option>

									</select>
								</div>

							</div>
						</div>
						<h4>Delegates</h4>
						<div class="form-group">
							<div class="row clearfix">
								<div class="col-xs-12 column">
									<table class="table table-bordered table-hover" id="tab_logic">
										<thead>
											<tr>
												<th class="text-center">#</th>

												<th class="text-center">Registration Number</th>
												<th class="text-center">Surname</th>
												<th class="text-center">Other names</th>
												<th class="text-center">Email Address</th>

											</tr>
										</thead>
										<tbody>
											<tr id='addr0'>
												<td>1</td>

												<td><input type="text" name='delagate_regno[]'
													placeholder='Registration Number' class="form-control"
													value="<?php echo set_value('delagate_regno[]'); ?>" /></td>
												<td><input type="text" name='delegate_surname[]'
													placeholder='Enter Surname' class="form-control"
													value="<?php echo set_value('delegate_surname[]'); ?>" /></td>
												<td><input type="text" name='delegate_othernames[]'
													placeholder='Enter Other Names' class="form-control"
													value="<?php echo set_value('delegate_othernames[]'); ?>" />
												</td>
												<td><input type="text" name='delegate_email[]'
													placeholder='Email Address' class="form-control"
													value="<?php echo set_value('delegate_email[]'); ?>" /></td>

											</tr>
											<tr id='addr1'></tr>
										</tbody>
									</table>
									<a id="add_row" class="btn btn-default pull-left">Add Delegates</a><a
										id='delete_row' class="pull-right btn btn-default">Remove</a>
								</div>
							</div>

						</div>

						<button type="submit" class="btn btn-primary">Register Event</button>

					</form>
				</div>


			</div>

		</div>
	</div>
</div>


