	<div role="tabpanel">

	<!-- Nav tabs -->
	<?php include('profile_tabs.php'); ?>

	<br>
  <!-- Tab panes -->
  <?php echo form_open('application/save_specialization','class=well'); ?>
    <div class="form-group">
    <div class="row">
      <div class="col-xs-6">  
	  <?php echo form_error('specialization'); ?>
       <input type="text" name="specialization" class="form-control" placeholder="Enter Specialization" value="<?php echo set_value('specialization',$this->form_data->specialization); ?>" required>
      </div>
	   <div class="col-xs-6">
       <button class="btn-form btn btn-primary" type="submit">Save Details</button>
      </div>
    </div>
    </div>
	
	

   


</div>