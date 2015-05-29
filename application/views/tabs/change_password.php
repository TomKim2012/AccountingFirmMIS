  <div role="tabpanel">

  <!-- Nav tabs -->
   <?php include('profile_tabs.php'); ?>
  
     <br>
  
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
   <!-- Button trigger modal -->
   
    <div class="row">
     <div class="col-xs-">
     <?php echo form_open('application/update_profile','class=well'); ?>
      <div class="form-group">
    <div class="row">
      <div class="col-xs-6">
       <label for="firstname">Old Password</label>
        
        <input type="password" name="old_password" class="form-control" placeholder="Old Password" value="" required>
      </div>
      <div class="col-xs-6">
       <label for="lastname">New Password</label>
       
        <input type="new_password" name="last_name" class="form-control" placeholder="Last Name" value="" required>
        
          <label for="r_new_pass">Repeat Password</label>
       
        <input type="repeat_new_pass" name="last_name" class="form-control" placeholder="Last Name" value="" required>
      </div>
    </div>
    </div>

    <button type="submit" class="btn btn-primary">Change Password</button>
      
      <?php  echo form_close() ?>
   
     </div>
    </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">...</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>
  


</div>  
  


</div>