<div class="row">

   <div class="col-xs-3">
<div class="well">
       <?php $this->load->view('includes/profile-side'); ?>
</div>
   	
   </div>
   <div class="col-xs-8">
   <h3 class="section-title"><?php echo $page_title; ?></h3>
 
	<div class="row">
	<div class="col-xs-12">

	<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Standards & Auditing</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Taxation</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Conferences</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Accounting</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    	<br>

    	
<script type="text/javascript">
	$(document).ready(function() {
    $('#events').DataTable();
} );
</script>
    	
    	<table id="events" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Dates</th>
                <th>Venue</th>
                <th>Price</th>
                <th>CPD Hours</th>
                <th>Action</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Event Name</th>
                <th>Dates</th>
                <th>Venue</th>
                <th>Price</th>
                <th>CPD</th>
                <th>Action</th>
            </tr>
        </tfoot>
 
        <tbody>
            <tr>
                <td>Financial Reporting Workshop for Cooperative Societies.</td>
                <td>14th July 2015 - 19th July 2015</td>
                <td> KCA University Plenary Hall</td>
                <td>61</td>
                <td>40 HRS</td>
                <td><a href="<?php echo site_url('application/view_event')?>">View</a></td>
            </tr>
            <tr>
                <td>Financial Reporting Workshop for Cooperative Societies.</td>
                <td>14th July 2015 - 19th July 2015</td>
                <td> KCA University Plenary Hall</td>
                <td>61</td>
                <td>40 HRS</td>
                <td><a href="<?php echo site_url('application/view_event')?>">View</a></td>
            </tr>
            </tbody>
            </table>

	

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">...</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>

</div>








	
		
	</div>
		
	</div>
   </div>
</div>


