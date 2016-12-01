<?php if(isset($header)) echo $header; 
 if(isset($left_menu)) echo $left_menu; 
 if(isset($top_nav)) echo $top_nav;
 ?>
 <!-- page content -->
<div class="right_col" role="main">
 <div class="row">
	<div class="col-xs-4">
	</div>
	<div class="col-xs-4">
		<a href="<?php echo base_url();?>settings/service">My Services</a>
	</div>
 </div>
</div>
<?php if(isset($footer)) echo $footer; ?>