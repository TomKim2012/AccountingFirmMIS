    <?php 
              foreach($css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
              <?php endforeach; ?>
              <?php foreach($js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>

      <div class="container-fluid">
      <div class="row">
      <?php $this->load->view('includes/sidebar') ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h4 class="page-header">Dashboard</h4>

          <h2 class="sub-header"><?php if(isset($section_title)){ echo $section_title;} ?></h2>
          
           <?php echo $output; ?>
          
        </div>
      </div>
    </div>

  