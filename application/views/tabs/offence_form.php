	<div role="tabpanel">

	<!-- Nav tabs -->
	
	<br>
  <!-- Tab panes -->
  <?php echo form_open('application/save_offence','class=well'); ?>
  <h4 class="error"><?php if(isset($msg)){ echo $msg; } ?></h4>
    <div class="form-group">
    <div class="row">
      <div class="col-xs-12">
       <label for="institution">Offence</label>
	    <?php echo form_error('offense'); ?>
        <input type="text" name="offense" class="form-control" placeholder="Offence" value="<?php echo set_value('offense',$this->form_data->offense); ?>" required>
		 <input type="hidden" name="offenceid" value="<?php if(isset($offenceid)){echo $offenceid;} ?>">
      </div>
    </div>
    </div>
	
	<div class="form-group">
	<div class="row">
      <div class="col-xs-12">
       <label for="exambody">Sentence Imposed</label>
		<?php echo form_error('sentenceImposed'); ?>
        <input type="text" name="sentenceImposed" class="form-control" placeholder="Sentence Imposed" value="<?php echo set_value('sentenceImposed',$this->form_data->sentenceImposed); ?>" required>
      </div>
    </div>
    </div>

    <div class="form-group">
      <div class="row">
       <div class="col-xs-6">
       <label for="startdate">Date Convicted</label>
		<?php echo form_error('dateConvicted'); ?>
        <input type="date" name="dateConvicted" class="form-control" placeholder="Enter Date Convicted" value="<?php echo set_value('dateConvicted',$this->form_data->dateConvicted); ?>" required>
      </div>
      <div class="col-xs-6">
       <label for="class">Place Convicted</label>
       <?php echo form_error('placeConvicted'); ?>
        <input type="text" name="placeConvicted" class="form-control" placeholder="Enter Place Convicted" value="<?php echo set_value('placeConvicted',$this->form_data->placeConvicted); ?>" required>
      </div>
    </div>
   </div>
   

    <div class="form-group">
      <div class="row">
       <div class="col-xs-6">
       <button class="btn-form btn btn-primary" type="submit">Save Details</button>
      </div>
      <div class="col-xs-6">
      
      </div>
    </div>
    </div>



</div>