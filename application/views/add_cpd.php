<div class="row">
	<div class="col-xs-8">

		<div class="row cpd">
			<div class="col-xs-4 cpdside">
				<span>170</span> <br>TOTAL CPD HOURS
			</div>
			<div class="col-xs-4 cpdside">
				<span>300</span><br>CPD TARGET
			</div>
			<div class="col-xs-4">
				<span>130</span><br>TO ACHIEVE
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h4 class="section-title">Please fill in the form details below</h4>
				<h4 class="error"><?php if(isset($msg)){ echo $msg; } ?></h4>

				<form class="form-vertical well"
					action="<?php echo site_url("/application/sendcpd"); ?>"
					method="POST">
					<div class="form-group">
						<div class="row">
							<div class="col-xs-12">
								<label for="emailaddress">Select Event</label>
					    <?php echo form_error('event_id'); ?>
					    <select name="event_id" class="form-control" required>
									<option value="AUELF2mSTVAM8feO">Financial Reporting Workshop
										for Cooperative Societies</option>
									<option value="">Event 2</option>
									<option value="">Event 3</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<label for="emailaddress">Start Date</label>
					    <?php echo form_error('start_date'); ?>
					    <input type="date" name="start_date" class="form-control"
									placeholder="Enter Start Date"
									value="<?php echo set_value('start_date'); ?>" required>
							</div>
							<div class="col-xs-6">
								<label for="emailaddress">End Date</label>
					    <?php echo form_error('end_date'); ?>
					    <input type="date" name="end_date" class="form-control"
									placeholder="Enter End Date"
									value="<?php echo set_value('end_date'); ?>" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-12">
								<label for="emailaddress">CPD Hours</label>
					    <?php echo form_error('cpd_hours'); ?>
					    <input type="text" name="cpd_hours" class="form-control"
									placeholder="Enter CPD Hours"
									value="<?php echo set_value('cpd_hours'); ?>" required>
							</div>
						</div>
					</div>


					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>


		<div class="row">
			<div class="col-xs-12">
				<div class="upcoming">Upcoming Trainings</div>
				<p>
					<span class="badge">1</span> <a
						href="<?php echo site_url('application/view_event')?>">Leadership
						from a Slightly Different Perspective </a>
				</p>
				<p>
					<span class="badge">2</span> <a
						href="<?php echo site_url('application/view_event')?>">Leadership
						from a Slightly Different Perspective </a>
				</p>
				<p>
					<span class="badge">3</span> <a
						href="<?php echo site_url('application/view_event')?>">Leadership
						from a Slightly Different Perspective </a>
				</p>
				<span class="label label-default more-view">View More</span>
			</div>


		</div>
	</div>
</div>
