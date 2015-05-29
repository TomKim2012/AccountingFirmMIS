<div class="row">

   <div class="col-xs-3">
<div class="well">
       <?php $this->load->view('includes/profile-side'); ?>
</div>
   	
   </div>
   <div class="col-xs-8">
  
<div class="row cpd">
	<div class="col-xs-4 cpdside"><span>170</span> <br>TOTAL CPD HOURS</div>
	<div class="col-xs-4 cpdside"><span>300</span><br>CPD TARGET</div>
	<div class="col-xs-4"><span>130</span><br>TO ACHIEVE</div>
</div>
	<div class="row">
	<div class="col-xs-12">
	  <h4 class="error"><?php if(isset($msg)){ echo $msg; } ?></h4>

	  <a href="<?php echo site_url('application/addcpd') ?>" class="btn btn-primary">ADD CPD</a>

	<div class="table-responsive">
	
    	
<script type="text/javascript">
	$(document).ready(function() {
    $('#cpd').DataTable();
} );
</script>
    	
    	<table id="cpd" class="display" width="100%" cellspacing="0">
        <thead>
			<th>#</th>
			<th>Course Name</th>
			<th>Dates</th>
			<th>CPD Hours</th>
			<th>STATUS</th>
			</tr>
			</thead>
			<tbody>
	 		<?php 
            if($mycpd != NUll){
             $cpno = 0;
             foreach ($mycpd as $cpd) : 
             	$cpno++;
           ?>
			<tr>
			<th scope="row"><?php echo $cpno; ?></th>
			<td><?php if(isset($cpd->eventName)){echo $cpd->eventName; }?></td>
			<td><?php if(isset($cpd->startDate)){echo date("F j, Y", strtotime($cpd->startDate)); }?> to <?php if(isset($cpd->endDate)){echo date("F j, Y", strtotime($cpd->endDate)); }?></td>
			<td><?php if(isset($cpd->cpdHours)){echo $cpd->cpdHours; }?></td>
			<td><span class="label label-danger"><?php if(isset($cpd->status)){echo $cpd->status; }?></span></td>
			</tr>
			<?php endforeach; }
                      else echo "NO CPD"; ?>
			</tbody>
	  </table>
	</div>






	<div class="row">
		
		<div class="col-xs-12">
		<div class="upcoming">Upcoming Trainings</div>
		<p><span class="badge">1</span> <a href="<?php echo site_url('application/view_event')?>" >Leadership from a Slightly Different Perspective </a></p>
		<p><span class="badge">2</span> <a href="<?php echo site_url('application/view_event')?>" >Leadership from a Slightly Different Perspective </a></p>
		<p><span class="badge">3</span> <a href="<?php echo site_url('application/view_event')?>" >Leadership from a Slightly Different Perspective </a></p>
		<span class="label label-default more-view">View More</span>
		</div>
		
      
	</div>
	
		
	</div>
		
	</div>
   </div>
</div>


