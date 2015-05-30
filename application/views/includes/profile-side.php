       
<?php if ($this->session->userdata('USERLOGGED')) { ?>
<h5 class="section-title">Members Section</h5>
<hr>
<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">

</ul>
<?php } else { ?>
<h5 class="section-title">Users Section</h5>
<hr>
<h5>Already a Member ?</h5>

<a href="<?php echo site_url('auth')?>" class="btn btn-primary">LOGIN</a>

<?php }  ?>