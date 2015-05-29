<div class="row">
   <div class="col-xs-3">
      <div class="well">
       <?php $this->load->view('includes/profile-side'); ?>
      </div>
   	
   </div>
   <div class="col-xs-9">
   	  <div class="row">
		<div class="col-xs-2">
			<img class="thumbnail" src="<?php echo base_url() ?>/assets/img/no-image.png" width="100px">
			<a href="">Edit Image</a>
		</div>
		<div class="col-xs-6">
			<h5><strong><?php echo $this->session->userdata('first_name'); ?>  <?php echo $this->session->userdata('last_name'); ?></strong></h5>	
		     <a href="<?php echo site_url('application/member_details')?>">Edit Profile</a> | <a href="<?php echo site_url('auth/change_password')?>">Change Password</a> 
	         <br>
		     <span><h5><strong>NoN-Member</strong> (Please Complete Your Profile By 20th July 2015)</h5></span> 
		     <div class="progress warning">
			  <div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
			    60% Complete
			  </div>
			</div>
		</div>
		
	</div>
	<div class="row">
	<div class="col-xs-12">

	<?php $this->load->view($tab_view) ?>

	</div>
		
	</div>
   </div>
</div>

