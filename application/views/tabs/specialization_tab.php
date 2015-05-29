	<div role="tabpanel">

  <!-- Nav tabs -->
	<?php include('profile_tabs.php'); ?>
	
	<br>
	
    <a href="<?php echo site_url('application/add_specialization')?>" class="btn btn-primary">ADD SPECIALIZATION</a>
	<br>
	<h4 class="error"><?php if(isset($msg)){ echo $msg; } ?></h4>
  <!-- Tab panes -->
  
  <div class="row">
  <div class="col-sm-4">
  <h5>Practice</h5>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Auditing
    </label>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> Taxation
    </label>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> Financial Consulting
    </label>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> HR Consultancy
    </label>
  </div>
  </div>
  
  <div class="col-sm-4">
  <h5>Commerce and Industry</h5>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Banking
    </label>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> Finance
    </label>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> Insurance
    </label>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> Manufacturing
    </label>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> Hotel
    </label>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> Other service industry
    </label>
  </div>
  </div>
  
  <div class="col-sm-4">
  <h5>Public Sector</h5>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Central Government
    </label>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> Local Government
    </label>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> State Corporation
    </label>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> Co-operative
    </label>
  </div>
  
   <h5>Training</h5>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Education or Academia
    </label>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> NGOs
    </label>
  </div>
  </div>
  </div>
  
  
  
  
  
  <div class="table-responsive">
	  <table class="table">
	    <thead>
			<tr>
			<th>#</th>
			<th>Specialization</th>
			</tr>
			</thead>
			<tbody>
	 		<?php 
            if(isset($myspecialization)){
             $cpno = 0;
             foreach ($myspecialization as $muedu) : 
             	$cpno++;
           ?>
			<tr>
			<td><?php echo $cpno; ?></td>
			<td><?php if(isset($muedu->specialization)){echo $muedu->specialization; }?></td>
			</tr>
			<?php endforeach; }
                      else echo "NO SPECIALIZATION"; ?>
			</tbody>
			
	  </table>
	</div>
 

</div>