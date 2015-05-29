	<div role="tabpanel">

  <!-- Nav tabs -->
   <?php include('profile_tabs.php'); ?>
	<br>
	
  <!-- Tab panes -->
<?php echo form_open('application/update_profile','class=well'); ?>

	<h4 class="error"><?php if(isset($msg)){ echo $msg; } ?></h4>
    <div class="form-group">
    <div class="row">
      <div class="col-xs-6">
       <label for="firstname">First Name</label>
         <?php echo form_error('first_name'); ?>
		    <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php echo set_value('first_name',$this->form_data->first_name); ?>" required>
      </div>
      <div class="col-xs-6">
       <label for="lastname">Last Name</label>
        <?php echo form_error('last_name'); ?>
		    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo set_value('last_name',$this->form_data->last_name); ?>" required>
      </div>
    </div>
    </div>

	<div class="form-group">
	<div class="row">
	  <div class="col-xs-6">
	   <label for="emailaddress">Email Address</label>
		<?php echo form_error('email_address'); ?>
		<input type="text" name="email_address" class="form-control" placeholder="Email address" value="<?php echo set_value('email_address',$this->form_data->email_address); ?>" required>
	  </div>
	   <div class="col-xs-6">
	   <label>Phone Number</label>
		<?php echo form_error('phoneNumber'); ?>
		 <input type="text" class="form-control" name="phoneNumber" placeholder="Enter Phone Number" value="<?php echo set_value('phoneNumber',$this->form_data->phoneNumber); ?>" required>
	  </div>
	</div>
	</div>

    <div class="form-group">
	    <div class="row">
		  <div class="col-xs-6">
		    <label >Gender</label>
			<?php echo form_error('gender'); ?>
			<?php $class = 'class="form-control" required';
			if(!isset($genderid)){ $genderid = set_value('gender',$this->form_data->gender);;    } 
			echo form_dropdown('gender', $gender, $genderid, $class); ?>
			
		  </div>
		  <div class="col-xs-6">
		   <label for="cpassword">Date of Birth</label>
		    <?php echo form_error('dob'); ?>
		   <input type="date" class="form-control" name="dob" placeholder="Date of Birth" value="<?php echo set_value('dob',$this->form_data->dob); ?>" required>
		  </div>
		</div>
	  </div>

   


    <div class="form-group">
	    <div class="row">
		  <div class="col-xs-4">
		    <label >Residence</label>
			<?php echo form_error('residence'); ?>
			<input type="text" class="form-control" name="residence" placeholder="Enter Residence" value="<?php echo set_value('residence',$this->form_data->residence); ?>" required>
		  </div>
		  <div class="col-xs-4">
		   <label >Address</label>
		    <?php echo form_error('address'); ?>
		   <input type="text" class="form-control" name="address" placeholder="Enter Address" value="<?php echo set_value('address',$this->form_data->address); ?>" required>
		  </div>
		   <div class="col-xs-4">
		   <label >City / Town</label>
		    <?php echo form_error('city'); ?>
		   <input type="text" class="form-control" name="city" placeholder="Enter City" value="<?php echo set_value('city',$this->form_data->city); ?>" required>
		  </div>
		</div>
	  </div>
	  
	  <div class="form-group">
	    <div class="row">
		  <div class="col-xs-6">
		    <label >Country</label>
			<?php echo form_error('nationality'); ?>
			<?php $class = 'class="form-control" required';
			if(!isset($nationalityid)){ $nationalityid = set_value('nationality',$this->form_data->nationality);;    } 
			echo form_dropdown('nationality', $nationality, $nationalityid, $class); ?>
		  </div>
		  <div class="col-xs-6">
		    <label >Salutation</label>
			<?php echo form_error('salutation'); ?>
			<?php $class = 'class="form-control" required';
			if(!isset($salutationid)){ $salutationid = set_value('salutation',$this->form_data->salutation);;    } 
			echo form_dropdown('salutation', $salutation, $salutationid, $class); ?>
		  </div>
		</div>
	  </div>


   
    <button type="submit" class="btn btn-primary">Update Details</button>
  </form>



</div>