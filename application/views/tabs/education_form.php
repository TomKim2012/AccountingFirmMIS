	<div role="tabpanel">

	<!-- Nav tabs -->
	<?php include('profile_tabs.php'); ?>

	<br>
  <!-- Tab panes -->
  <?php echo form_open('application/save_education','class=well'); ?>
    <div class="form-group">
    <div class="row">
      <div class="col-xs-6">
       <label for="institution">Institution Name</label>
	    <?php echo form_error('institution'); ?>
        <input type="text" name="institution" class="form-control" placeholder="Enter Institution Name" value="<?php echo set_value('institution',$this->form_data->institution); ?>" required>
		 <input type="hidden" name="eduid" value="<?php if(isset($eduid)){echo $eduid;} ?>">
      </div>
      <div class="col-xs-6">
       <label for="exambody">Examination Body</label>
		<?php echo form_error('examiningBody'); ?>
        <input type="text" name="examiningBody" class="form-control" placeholder="Enter Examination Body" value="<?php echo set_value('examiningBody',$this->form_data->examiningBody); ?>" required>
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
       <label for="class">Date Completed</label>
       <?php echo form_error('dateCompleted'); ?>
        <input type="date" name="dateCompleted" class="form-control" placeholder="Enter End Date" value="<?php echo set_value('dateCompleted',$this->form_data->dateCompleted); ?>" required>
      </div>
    </div>
    </div>
    <div class="form-group">
      <div class="row">
       <div class="col-xs-6">
       <label for="enddate">Section Passed</label>
       <?php echo form_error('sectionsPassed'); ?>
        <input type="text" name="sectionsPassed" class="form-control" placeholder="Enter Section passed" value="<?php echo set_value('sectionsPassed',$this->form_data->sectionsPassed); ?>" required>
      </div>
      <div class="col-xs-6">
       <label for="award">Registration Number</label>
       <?php echo form_error('registrationNo'); ?>
        <input type="text" name="registrationNo" class="form-control" placeholder="Enter Start Date" value="<?php echo set_value('registrationNo',$this->form_data->registrationNo); ?>" required>
      </div>
    </div>
    </div>
	
	 <div class="form-group">
      <div class="row">
       <div class="col-xs-6">
       <label for="enddate">Class / Division</label>
       <?php echo form_error('classOrDivision'); ?>
        <input type="text" name="classOrDivision" class="form-control" placeholder="Enter Class or Division" value="<?php echo set_value('classOrDivision',$this->form_data->classOrDivision); ?>" required>
      </div>
      <div class="col-xs-6">
       <label for="enddate">Award</label>
       <?php echo form_error('award'); ?>
        <input type="text" name="award" class="form-control" placeholder="Enter Award" value="<?php echo set_value('award',$this->form_data->award); ?>" required>
      </div>
    </div>
    </div>
	
	<div class="form-group">
      <div class="row">
       <div class="col-xs-6">
       <label for="enddate">Education Type</label>
       <?php echo form_error('gender'); ?>
		<?php $class = 'class="form-control" required';
		if(!isset($edutypeid)){ $edutypeid = set_value('education_type',$this->form_data->education_type);;    } 
		echo form_dropdown('education_type', $education_type, $edutypeid, $class); ?>
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