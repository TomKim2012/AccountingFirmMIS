<script type="text/javascript">


    $(document).ready(function() {
    var i=1;
	$("#add_row").click(function(){
	$('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='mail"+i+"' type='text' placeholder='Mail'  class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text' placeholder='Mobile'  class='form-control input-md'></td>");

	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
	i++; 
	});
	$("#delete_row").click(function(){
	 if(i>1){
	 $("#addr"+(i-1)).html('');
	 i--;
	 }
	});
    

      
    
    });

</script>
<div class="row">

   <div class="col-xs-3">
<div class="well">
       <?php $this->load->view('includes/profile-side'); ?>
</div>
   	
   </div>
   <div class="col-xs-9">
   	
	<div class="row">
	<div class="col-xs-12">
	<div class="row">
		
		<div class="col-xs-12">

			<a href="<?php echo site_url('application/bookevent/400');?>" class="event-title">Financial Reporting Workshop for Cooperative Societies.</a>
			
		    <div class="event-info"><i>Start Date: </i>14th July 2015 <i> | End Date: </i>19th July 2015 , <i>Venue: </i> KCA University Plenary Hall.</div>
		     <div class="event-info"><i>CPD Hours: </i> 14 Hours </div>
		    <div class="event-info"><i>Member Price: </i> KES 25,000.00 | Non-member Price: </i> KES 26,000.00</div>
		    
		    <div class="row">
			<div class="col-md-12">
			<h4 class="section-title">Please fill in the form details below</h4>
				
				<div class="row clearfix">
						<div class="col-xs-12 column">
							<table class="table table-bordered table-hover" id="tab_logic">
								<thead>
									<tr >
										<th class="text-center">
											#
										</th>
										<th class="text-center">
											Name
										</th>
										<th class="text-center">
											Mail
										</th>
										<th class="text-center">
											Mobile
										</th>
									</tr>
								</thead>
								<tbody>
									<tr id='addr0'>
										<td>
										1
										</td>
										<td>
										<input type="text" name='name0'  placeholder='Name' class="form-control"/>
										</td>
										<td>
										<input type="text" name='mail0' placeholder='Mail' class="form-control"/>
										</td>
										<td>
										<input type="text" name='mobile0' placeholder='Mobile' class="form-control"/>
										</td>
									</tr>
				                    <tr id='addr1'></tr>
								</tbody>
							</table>
							<a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
						</div>
					</div>
				</div>
	
				</div>

		  
		</div>
		
      
	</div>

	</div>
		
	</div>
   </div>
</div>


