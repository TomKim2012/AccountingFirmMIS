	<div role="tabpanel">

  <!-- Nav tabs -->
	
<?php include('profile_tabs.php'); ?>
	<br>
    <a href="<?php echo site_url('application/add_education')?>" class="btn btn-primary">ADD RECORD</a>
	<br>
	<h4 class="error"><?php if(isset($msg)){ echo $msg; } ?></h4>
  <!-- Tab panes -->
  <div class="table-responsive">
	 <script type="text/javascript">

$(document).ready(function() {
    $('table.display').dataTable({
        "pageLength": 3
       
    });
} );
</script>
 <div class="panel panel-default">
  <div class="panel-heading">Academia Information</div>
  <div class="panel-body">
    	
    	<table id="" class="display" width="100%" cellspacing="0">
        <thead>
			<tr>
			
			<th>Institution</th>
			<th>From</th>
			<th>To</th>
			<th>Exam Body</th>
			<th>Class/Division</th>
			<th>Awarded</th>
			<th>Reg No.</th>
			<th>Section Passed</th>
			<th>Action</th>
			</tr>
			</thead>
			<tbody>
	 		<?php 
			//For Academia Records
            if(isset($myeducations)){
             $cpno = 0;
             foreach ($myeducations as $muedu) : 
             	$cpno++;
           ?>
			<tr>
			
			<td><?php if(isset($muedu->institution)){echo $muedu->institution; }?></td>
			<td><?php if(isset($muedu->startDate)){echo date("d/m/Y", strtotime($muedu->startDate)); }?> </td>
			<td><?php if(isset($muedu->dateCompleted)){echo date("d/m/Y", strtotime($muedu->dateCompleted)); }?></td>
			<td><?php if(isset($muedu->examiningBody)){echo $muedu->examiningBody; }?></td>
			<td><?php if(isset($muedu->classOrDivision)){echo $muedu->classOrDivision; }?></td>
			<td><?php if(isset($muedu->award)){echo $muedu->award; }?></td>
			<td><?php if(isset($muedu->registrationNo)){echo $muedu->registrationNo; }?></td>
			<td><?php if(isset($muedu->sectionsPassed)){echo $muedu->sectionsPassed; }?></td>
			
			<td><a href="<?php echo site_url('application/edit_education/'.$muedu->refId)?>"  class="btn btn-info btn-xs" role="button">&nbsp;Edit	</a> &nbsp; <a href="<?php echo site_url('application/delete_education/'.$muedu->refId)?>"  class="btn btn-danger btn-xs" role="button">&nbsp;Delete	</a></td>
			</tr>
			<?php endforeach; }
                      else echo "NO EDUCATION"; ?>
			</tbody>
			
	  </table>
	  </div>
</div>
	  
	   <div class="panel panel-default">
  <div class="panel-heading"> Professional Examinations</div>
  <div class="panel-body">
   <a href="<?php echo site_url('application/add_education')?>">ADD RECORD</a>
	  
	 
	  <table id="" class="display" width="100%" cellspacing="0">
        <thead>
			<tr>
			
			<th>Institution</th>
			<th>From</th>
			<th>To</th>
			<th>Exam Body</th>
			<th>Class/Division</th>
			<th>Awarded</th>
			<th>Reg No.</th>
			<th>Section Passed</th>
			
			<th>Action</th>
			</tr>
			</thead>
			<tbody>
	 		<?php 
			//For Professional Examination Records
            if(isset($myeducations)){
             $cpno = 0;
             foreach ($myeducations as $muedu) : 
             	$cpno++;
           ?>
			<tr>
			
			<td><?php if(isset($muedu->institution)){echo $muedu->institution; }?></td>
			<td><?php if(isset($muedu->startDate)){echo date("d/m/Y", strtotime($muedu->startDate)); }?> </td>
			<td><?php if(isset($muedu->dateCompleted)){echo date("d/m/Y", strtotime($muedu->dateCompleted)); }?></td>
			<td><?php if(isset($muedu->examiningBody)){echo $muedu->examiningBody; }?></td>
			<td><?php if(isset($muedu->classOrDivision)){echo $muedu->classOrDivision; }?></td>
			<td><?php if(isset($muedu->award)){echo $muedu->award; }?></td>
			<td><?php if(isset($muedu->registrationNo)){echo $muedu->registrationNo; }?></td>
			<td><?php if(isset($muedu->sectionsPassed)){echo $muedu->sectionsPassed; }?></td>
			
			<td><a href="<?php echo site_url('application/edit_education/'.$muedu->refId)?>"  class="btn btn-info btn-xs" role="button">&nbsp;Edit	</a> &nbsp; <a href="<?php echo site_url('application/delete_education/'.$muedu->refId)?>"  class="btn btn-danger btn-xs" role="button">&nbsp;Delete	</a></td>
			</tr>
			<?php endforeach; }
                      else echo "NO EDUCATION"; ?>
			</tbody>
			
	  </table>
	  
	  </div>
</div>
	  
	  
	  
	  
	  
	  
	  
	</div>
 

</div>