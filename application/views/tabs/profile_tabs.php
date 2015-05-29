 <ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="<?php if(isset($profileactive)){if($profileactive == 1){ echo "active";}} ?>"><a  href="<?php echo site_url('application/profile')?>">Basic Information</a></li>
	<li role="presentation" class="<?php if(isset($profileactive)){if($profileactive == 2){ echo "active";}} ?>"><a href="<?php echo site_url('application/education')?>" >Education Information</a></li>
	
	<li role="presentation" class="<?php if(isset($profileactive)){if($profileactive == 4){ echo "active";}} ?>"><a href="<?php echo site_url('application/trainings')?>">Trainings</a></li>
	<li role="presentation" class="<?php if(isset($profileactive)){if($profileactive == 5){ echo "active";}} ?>"><a href="<?php echo site_url('application/specialization')?>">Specialization</a></li>
  </ul>