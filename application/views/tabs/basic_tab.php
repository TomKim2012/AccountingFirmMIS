	<div role="tabpanel">

  <!-- Nav tabs -->
   <?php include('profile_tabs.php'); ?>
	
     <br>
	
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
	 <!-- Button trigger modal -->
	 
    <div class="row">
     <div class="col-xs-6">
    
    	<table class="table">
	      <tr><td>First Names:</td><td><i><?php echo $this->form_data->first_name; ?></i></td></tr>
        <tr><td>Last Name:</td><td><i><?php echo $this->form_data->last_name; ?></i></td></tr>
        <tr><td>Email Address:</td><td><i><?php echo $this->form_data->email_address; ?></i></td></tr>
        <tr><td>Phone Number:</td><td><i><?php echo $this->form_data->phoneNumber; ?></i></td></tr>
        <tr><td>Gender:</td><td><i><?php echo $this->form_data->gender; ?></i></td></tr>
        <tr><td>Age Group:</td><td><i>21 - 30</i></td></tr>
        <tr><td>Date Of Birth:</td><td><i><?php echo $this->form_data->dob; ?></i></td></tr>   
    </table>
    
    </div>
     <div class="col-xs-6">
     <table class="table">
      <tr><td>Residence:</td><td><i><?php echo $this->form_data->residence; ?></i></td></tr>
        <tr><td>Address:</td><td><i><?php echo $this->form_data->email_address; ?></i></td></tr>
		 <tr><td>Town / City:</td><td><i><?php echo $this->form_data->city; ?></i></td></tr>
        <tr><td>Country:</td><td><i><?php echo $this->form_data->nationality; ?></i></td></tr>
        <tr><td>Salutation:</td><td><i><?php echo $this->form_data->salutation; ?></i></td></tr>
           
    </table>
     </div>
    </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">...</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>
  
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
			<?php echo form_open('application/update_profile','class=well'); ?>
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Update Profile</h4>
		  </div>
		  <div class="modal-body">
		
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
		     <input type="text" class="form-control" name="phoneNumber" placeholder="Enter Phone Number" value="<?php echo set_value('phoneNumber',$this->form_data->email_address); ?>" required>
		  </div>
		</div>
	  </div>

	   <div class="form-group">
	    <div class="row">
		  <div class="col-xs-6">
		    <label >Gender</label>
			<?php echo form_error('gender'); ?>
			<select name="gender" class="form-control" required>
			  <option value="">Select Gender</option>
			  <option value="MALE">MALE</option>
			  <option value="FEMALE">FEMALE</option>
			</select>
		  </div>
		  <div class="col-xs-6">
		   <label for="cpassword">Date of Birth</label>
		    <?php echo form_error('dob'); ?>
		   <input type="date" class="form-control" name="dob" placeholder="Date of Birth" required>
		  </div>
		</div>
	  </div>
	  
	   <div class="form-group">
	    <div class="row">
		  <div class="col-xs-4">
		    <label >Residence</label>
			<?php echo form_error('residence'); ?>
			<input type="text" class="form-control" name="residence" placeholder="Enter Residence" required>
		  </div>
		  <div class="col-xs-4">
		   <label >Address</label>
		    <?php echo form_error('address'); ?>
		   <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
		  </div>
		   <div class="col-xs-4">
		   <label >City / Town</label>
		    <?php echo form_error('city'); ?>
		   <input type="text" class="form-control" name="city" placeholder="Enter City" required>
		  </div>
		</div>
	  </div>
	  
	  <div class="form-group">
	    <div class="row">
		  <div class="col-xs-6">
		    <label >Country</label>
			<?php echo form_error('nationality'); ?>
			<select name="nationality" class="form-control" required>
			  <option value="">Select Country</option>
			  <option value="KENYA">KENYA</option>
			  <option value="UGANDA">UGANDA</option>
			</select>
		  </div>
		  <div class="col-xs-6">
		    <label >Salutation</label>
			<?php echo form_error('salutation'); ?>
			<select name="salutation" class="form-control" required>
			  <option value="">Select Salutation</option>
			  <option value="MR">MR</option>
			  <option value="MRS">MRS</option>
			</select>
		  </div>
		</div>
	  </div>
	  
	  
	
	
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Update Profile</button>
		  </div>
		  <?php  echo form_close() ?>;
		</div>
	  </div>
	</div>

</div>