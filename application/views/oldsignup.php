<div class="container">
<div class="row">
<div class="col-md-12">
<h4 class="section-title">Create Your ICPAK Account</h4><hr>
	 <?php echo form_open('auth/register_user'); ?>

	  <div class="form-group">
	  <label>Your Title</label>
	    <div class="row">
		  <div class="col-xs-2">
		   <label><input value="Mr" type="radio" name="title">&nbsp &nbsp Mr</label>
		  </div>
		 <div class="col-xs-2">
		   <label><input value="Mrs" type="radio" name="title">&nbsp &nbsp Mrs</label>
		  </div>
		   <div class="col-xs-2">
		   <label><input value="Miss" type="radio" name="title">&nbsp &nbsp Miss</label>
		  </div>
		</div>
	  </div>
	 
	  <div class="form-group">
		<div class="row">
		  <div class="col-xs-6">
		   <label for="firstname">First Name</label>
		    <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
		  </div>
		  <div class="col-xs-6">
		   <label for="lastname">Last Name</label>
		    <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
		  </div>
		</div>
	  </div>

	  <div class="form-group">
	    <div class="row">
		  <div class="col-xs-6">
		   <label for="username">Username</label>
		    <input type="text" name="username" class="form-control" placeholder="Username" required>
		  </div>
		  <div class="col-xs-6">
		   <label for="emailaddress">Email Address</label>
		    <input type="text" name="emailaddress" class="form-control" placeholder="Email address" required>
		  </div>
		</div>
	  </div>

	  <div class="form-group">
	  <label for="gender">Gender</label>
	    <div class="row">
		  <div class="col-xs-2">
		   <label><input value="male" type="radio" name="gender">&nbsp &nbsp Male</label>
		  </div>
		 <div class="col-xs-3">
		   <label><input value="female" type="radio" name="gender">&nbsp &nbsp Female</label>
		  </div>
		  <div class="col-xs-1">
		  </div>
		  <div class="col-xs-6">
		   <label for="dob">D.O.B</label>
		    <input type="text" name="dob" class="form-control" placeholder="D.O.B" required>
		  </div>
		</div>
	  </div>

    <div class="form-group">
    <label>Age Group</label>
	  <div class="row">
		  <div class="col-xs-2">
		   <label><input value="21-30" type="radio" name="agegroup"> 21-30</label>
		  </div>
		 <div class="col-xs-2">
		   <label><input value="31-40" type="radio" name="agegroup"> 31-40</label>
		  </div>
		  <div class="col-xs-2">
		   <label><input value="41-50" type="radio" name="agegroup"> 41-50</label>
		  </div>
		  <div class="col-xs-2">
		   <label><input value="51-60" type="radio" name="agegroup"> 51-60</label>
		  </div>
		  <div class="col-xs-3">
		   <label><input value="Above 60" type="radio" name="agegroup"> Above 60</label>
		  </div>
		</div>
	</div>


	  <div class="form-group">
	    <div class="row">
		   <div class="col-xs-6">
		   <label for="delegateId">delegateId</label>
		    <input type="text" name="delegateid" class="form-control" placeholder="delegateId">
		  </div>
		  <div class="col-xs-6">
		   <label for="exampleInputEmail1">D.O.B</label>
		    <input type="text" class="form-control" placeholder="Last Name">
		  </div>
		</div>
	  </div>

	  <div class="form-group">
	  <label>Current Location</label>
	    <div class="row">
		  <div class="col-xs-3">
		   <label><input value="kenya" type="radio" name="location">&nbsp &nbsp Kenya</label>
		  </div>
		 <div class="col-xs-3">
		   <label><input value="Overseas" type="radio" name="location">&nbsp &nbsp Overseas</label>
		  </div>
		  
		</div>
	  </div>

	   <div class="form-group">
	    <div class="row">
		  <div class="col-xs-6">
		   <label for="Nationality">Nationality</label>
		    <input type="text" name="nationality" class="form-control" placeholder="Nationality" required>
		  </div>
		  <div class="col-xs-6">
		   <label for="Salutation">Salutation</label>
		    <input type="text" name="salutation" class="form-control" placeholder="Salutation">
		  </div>
		</div>
	  </div>

	  <div class="form-group">
	    <div class="row">
		  <div class="col-xs-6">
		   <label for="residence">Residence</label>
		    <input type="text" name="residence" class="form-control" placeholder="Residence" required>
		  </div>
		  <div class="col-xs-6">
		   <label for="county">County</label>
		    <input type="text" name="county" class="form-control" placeholder="County">
		  </div>
		</div>
	  </div>
	  <div class="form-group">
	    <div class="row">
		  <div class="col-xs-6">
		   <label for="password">Password</label>
		    <input type="password" name="password" class="form-control" placeholder="Password" required>
		  </div>
		  <div class="col-xs-6">
		   <label for="cpassword">Confirm Password</label>
		    <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
		  </div>
		</div>
	  </div>

	 
	  <button type="submit" class="btn btn-primary">Register</button>
	</form>
</div>

	
</div>
</div>