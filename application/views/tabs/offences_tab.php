	<div role="tabpanel">

  <!-- Nav tabs -->
	
	
	<br>
	
    <a href="<?php echo site_url('application/add_offence')?>" class="btn btn-primary">ADD OFFENCE</a>
	
	<br>
	<h4 class="error"><?php if(isset($msg)){ echo $msg; } ?></h4>
  <!-- Tab panes -->
  <div class="table-responsive">
	  <table class="table">
	    <thead>
			<tr>
			<th>#</th>
			<th>Offence</th>
			<th>Sentence Imposed</th>
			<th>Date Convicted</th>
			<th>Place Convicted</th>
			<th>Action</th>
			</tr>
			</thead>
			<tbody>
	 		<?php 
           
            if(isset($myoffences)){
             $cpno = 0;
             foreach ($myoffences as $muedu) : 
             	$cpno++;
           ?>
			<tr>
			<td><?php echo $cpno; ?></td>
			<td><?php if(isset($muedu->offense)){echo $muedu->offense; }?></td>
			<td><?php if(isset($muedu->sentenceImposed)){echo $muedu->sentenceImposed; }?></td>
			<td><?php if(isset($muedu->dateConvicted)){echo date("F j, Y", strtotime($muedu->dateConvicted)); }?> </td>
			<td><?php if(isset($muedu->placeConvicted)){echo $muedu->placeConvicted; }?></td>
			<td><a href="<?php echo site_url('application/edit_offence/'.$muedu->refId)?>"  class="btn btn-info btn-xs" role="button">&nbsp;Edit	</a> &nbsp; <a href="<?php echo site_url('application/delete_offence/'.$muedu->refId)?>"  class="btn btn-danger btn-xs" role="button">&nbsp;Delete	</a></td>
			</tr>
			<?php endforeach; }
                      else echo "NO OFFENCES"; ?>
			</tbody>
			
	  </table>
	</div>
 

</div>