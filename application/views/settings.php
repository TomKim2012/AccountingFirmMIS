<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 13px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 13px;
}
a:hover
{
	text-decoration: underline;
}
</style>


<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>
            <?php $this->load->view('includes/side_menu') ?>
				




				<div class="main-content">
			<?php //$this->load->view('includes/breadcrumbs') ?>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                        <div class="panel panel-primary">
        
        <div class="panel-body">
                      <div class="span12">

                      <div>
		<a href='<?php echo site_url('settings')?>'>System Users</a> |
		<a href='<?php echo site_url('settings/ministries')?>'>Ministries</a> |
		<a href='<?php echo site_url('settings/directorates')?>'>Directorates</a> |
		<a href='<?php echo site_url('settings/formulas')?>'>Formulas</a> | 
		<a href='<?php echo site_url('settings/indicator_cat')?>'>Indicator Categories</a> |
		<a href='<?php echo site_url('settings/indicators')?>'>Indicators</a> |
		<a href='<?php echo site_url('settings/pillars')?>'>Pillars</a> | 
		<a href='<?php echo site_url('settings/projects')?>'>Projects</a> | 
		<a href='<?php echo site_url('settings/units')?>'>Units of Measure</a>
		
	</div>


                     <?php echo $output; ?>
		         


       
            </div>




          </div>
      </div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
