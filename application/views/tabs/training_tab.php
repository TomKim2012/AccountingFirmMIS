	<div role="tabpanel">

  <!-- Nav tabs -->
	<?php include('profile_tabs.php'); ?>
	
	<br>
	
    <a href="<?php echo site_url('application/add_training')?>" class="btn btn-primary">ADD TRAINING</a>
	
	<br>
	<h4 class="error"><?php if(isset($msg)){ echo $msg; } ?></h4>
  <!-- Tab panes -->
  <div class="panel panel-default">
  <div class="panel-heading">After CPA</div>
  <div class="panel-body">
  <div class="table-responsive">
	  <table class="table">
	    <thead>
			<tr>
			<th>#</th>
			<th>Organization</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Position</th>
			<th>Task Nature</th>
			<th>Responsibilities</th>
			<th>Clients</th>
			<th>Date Passed</th>
			<th>Type</th>
			</tr>
			</thead>
			<tbody>
	 		<?php 
            if(isset($mytrainings)){
             $cpno = 0;
             foreach ($mytrainings as $muedu) : 
             	$cpno++;
           ?>
			<tr>
			<td><?php echo $cpno; ?></td>
			<td><?php if(isset($muedu->organizationName)){echo $muedu->organizationName; }?></td>
			<td><?php if(isset($muedu->startDate)){echo date("F j, Y", strtotime($muedu->startDate)); }?> </td>
			<td><?php if(isset($muedu->endDate)){echo date("F j, Y", strtotime($muedu->endDate)); }?></td>
			<td><?php if(isset($muedu->positionHeld)){echo $muedu->positionHeld; }?></td>
			<td><?php if(isset($muedu->natureOfTasksPerformed)){echo $muedu->natureOfTasksPerformed; }?></td>
			<td><?php if(isset($muedu->responsibilities)){echo $muedu->responsibilities; }?></td>
			<td><?php if(isset($muedu->clientsHandled)){echo $muedu->clientsHandled; }?></td>
			<td><?php if(isset($muedu->datePassed)){echo $muedu->datePassed; }?></td>
			<td><?php if(isset($muedu->type)){echo $muedu->type; }?></td>
			</tr>
			<?php endforeach; }
                      else echo "NO TRAININGS"; ?>
			</tbody>
			
	  </table>
	</div>
  </div>
</div>
  <div class="panel panel-default">
  <div class="panel-heading">Before CPA</div>
  <div class="panel-body">
  <div class="table-responsive">
	  <table class="table">
	    <thead>
			<tr>
			<th>#</th>
			<th>Organization</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Position</th>
			<th>Task Nature</th>
			<th>Responsibilities</th>
			<th>Clients</th>
			<th>Date Passed</th>
			<th>Type</th>
			</tr>
			</thead>
			<tbody>
	 		<?php 
            if(isset($mytrainings)){
             $cpno = 0;
             foreach ($mytrainings as $muedu) : 
             	$cpno++;
           ?>
			<tr>
			<td><?php echo $cpno; ?></td>
			<td><?php if(isset($muedu->organizationName)){echo $muedu->organizationName; }?></td>
			<td><?php if(isset($muedu->startDate)){echo date("F j, Y", strtotime($muedu->startDate)); }?> </td>
			<td><?php if(isset($muedu->endDate)){echo date("F j, Y", strtotime($muedu->endDate)); }?></td>
			<td><?php if(isset($muedu->positionHeld)){echo $muedu->positionHeld; }?></td>
			<td><?php if(isset($muedu->natureOfTasksPerformed)){echo $muedu->natureOfTasksPerformed; }?></td>
			<td><?php if(isset($muedu->responsibilities)){echo $muedu->responsibilities; }?></td>
			<td><?php if(isset($muedu->clientsHandled)){echo $muedu->clientsHandled; }?></td>
			<td><?php if(isset($muedu->datePassed)){echo $muedu->datePassed; }?></td>
			<td><?php if(isset($muedu->type)){echo $muedu->type; }?></td>
			</tr>
			<?php endforeach; }
                      else echo "NO TRAININGS"; ?>
			</tbody>
			
	  </table>
	</div>
  </div>
</div>
</div>