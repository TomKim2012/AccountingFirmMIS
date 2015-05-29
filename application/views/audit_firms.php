<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <!-- text fonts -->
<link rel="stylesheet" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css" />
<script type="text/javascript">
$(document).ready(function() {
    $('#firms').DataTable();
} );
</script>
<div class="container">
<table class="table" id="firms" class="display" cellspacing="0" width="100%">
     <thead>
          <th>Firm Name/Partners</th>
          <th>Address</th>
          <th>Contacts</th>
          
          
     </thead>
     <tbody>
<?php if ($firms_list != NULL){ ?>
<?php foreach ($firms_list as $S) : ?>
<?php  ?>
     <tr>
          <td>
          <strong><?php echo $S->firm_name; ?></strong><br>
          <?php echo $S->partners; ?>
          </td>
          <td>
          <?php echo $S->address1; ?>
          <?php echo $S->address2; ?>
          <?php echo $S->address3; ?>
          <?php echo $S->city; ?>
          </td>
          <td>
          <?php echo $S->telephone; ?><br>
          <?php echo $S->email; ?>
          </td>
          
          
          
      
     </tr>
     <?php endforeach; } else echo "Sorry No Match Found"; ?>
          
     </tbody>
</table>
</div>