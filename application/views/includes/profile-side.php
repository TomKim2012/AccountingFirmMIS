           <?php if ($this->session->userdata('USERLOGGED')) { ?>
           <h5 class="section-title">Members Section</h5>
           <hr>
           <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
		<li role="presentation" class="<?php if(isset($active)){if($active == 1){ echo "active";}} ?>">
		<a href="<?php echo site_url('application/profile')?>"><i class="fa fa-user"></i> My Profile</a>
		</li>
		<li role="presentation" class="<?php if(isset($active)){if($active == 2){ echo "active";}} ?>">
		<a href="<?php echo site_url('application/events')?>"><i class="fa fa-tags"></i> My Bookings  <span class="badge">42</span></a>
		</li>
		<li role="presentation" class="<?php if(isset($active)){if($active == 3){ echo "active";}} ?>">
		<a href="<?php echo site_url('application/mycpd')?>"><i class="fa fa-graduation-cap"></i> My C.P.D</a>
		</li>
		<li role="presentation" class="<?php if(isset($active)){if($active == 4){ echo "active";}} ?>">
		<a href="<?php echo site_url('application/mycpd')?>"> <i class="fa fa-list-alt"></i> My Statement</a>
		</li>
		<li role="presentation" class="<?php if(isset($active)){if($active == 6){ echo "active";}} ?>">
		<a href="<?php echo site_url('application/offences')?>"> <i class="fa fa-user-secret"></i> Ofences</a>
		</li>
		<li role="presentation" class="<?php if(isset($active)){if($active == 5){ echo "active";}} ?>">
		<a href="<?php echo site_url('application/mycpd')?>"> <i class="fa fa-bullhorn"></i> Make an Enquiry</a>
		</li>
		
		
		<li role="presentation" >
		<a href="<?php echo site_url('auth/logout')?>"> <i class="fa fa-power-off"></i> Logout </a>
		</li>
	
	   </ul>
	   <?php } else { ?>
	   <h5 class="section-title">Users Section</h5>
           <hr>
           <h5>Already a Member ?</h5>
           
           <a href="<?php echo site_url('auth')?>" class="btn btn-primary">LOGIN</a>
	   
	   <?php }  ?>