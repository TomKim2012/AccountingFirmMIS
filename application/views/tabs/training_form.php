	<div role="tabpanel">

	<!-- Nav tabs -->
	<?php include('profile_tabs.php'); ?>

	<br>
  <!-- Tab panes -->
  <?php echo form_open('application/save_training','class=well'); ?>
    <div class="form-group">
    <div class="row">
      <div class="col-xs-6">
       <label for="institution">Organization Name</label>
	    <?php echo form_error('organizationName'); ?>
        <input type="text" name="organizationName" class="form-control" placeholder="Enter Organization Name" value="<?php echo set_value('organizationName',$this->form_data->organizationName); ?>" required>
      </div>
      <div class="col-xs-6">
       <label for="exambody">Position Held</label>
		<?php echo form_error('positionHeld'); ?>
        <input type="text" name="positionHeld" class="form-control" placeholder="Enter Position Held Body" value="<?php echo set_value('positionHeld',$this->form_data->positionHeld); ?>" required>
      </div>
    </div>
    </div>

    <div class="form-group">
      <div class="row">
       <div class="col-xs-6">
       <label for="startdate">Start Date</label>
		<?php echo form_error('startDate'); ?>
        <input type="date" name="startDate" class="form-control" placeholder="Enter Start Date" value="<?php echo set_value('startDate',$this->form_data->startDate); ?>" required>
      </div>
      <div class="col-xs-6">
       <label for="class">End Date</label>
       <?php echo form_error('endDate'); ?>
        <input type="date" name="endDate" class="form-control" placeholder="Enter End Date" value="<?php echo set_value('endDate',$this->form_data->endDate); ?>" required>
      </div>
    </div>
    </div>
   
	 <div class="form-group">
      <div class="row">
       <div class="col-xs-6">
       <label for="enddate">Responsibilities</label>
       <?php echo form_error('responsibilities'); ?>
        <input type="text" name="responsibilities" class="form-control" placeholder="Enter Responsibilities" value="<?php echo set_value('responsibilities',$this->form_data->responsibilities); ?>" required>
      </div>
      <div class="col-xs-6">
       <label for="enddate">Clients Handled</label>
       <?php echo form_error('clientsHandled'); ?>
        <input type="text" name="clientsHandled" class="form-control" placeholder="Enter Clients Handled" value="<?php echo set_value('clientsHandled',$this->form_data->clientsHandled); ?>" required>
      </div>
    </div>
    </div>
	
	<div class="form-group">
      <div class="row">
	   <div class="col-xs-6">
       <label for="enddate">Date Passed</label>
       <?php echo form_error('datePassed'); ?>
        <input type="text" name="datePassed" class="form-control" placeholder="Enter Date Passed" value="<?php echo set_value('datePassed',$this->form_data->datePassed); ?>" required>
      </div>
       <div class="col-xs-6">
       <label for="enddate">Training Type</label>
       <?php echo form_error('training_type'); ?>
		<?php $class = 'class="form-control" required';
		if(!isset($trtypeid)){ $trtypeid = set_value('training_type',$this->form_data->training_type);;    } 
		echo form_dropdown('training_type', $training_type, $trtypeid, $class); ?>
      </div>
    </div>
    </div>
	
	<div class="form-group">
      <div class="row">
       <div class="col-xs-12">
       <label for="enddate">Nature of Task Performed </label>
       <?php echo form_error('natureOfTasksPerformed'); ?>
       <input type="text" name="natureOfTasksPerformed" class="form-control" placeholder="Enter Nature of Task" value="<?php echo set_value('natureOfTasksPerformed',$this->form_data->natureOfTasksPerformed); ?>" required>
      </div>
    </div>
    </div>

    <div class="form-group">
      <div class="row">
       <div class="col-xs-6">
       <button class="btn-form btn btn-primary" type="submit">Save Details</button>
      </div>
      <div class="col-xs-6">
      
      </div>
    </div>
    </div>



</div>