<?php include('partials/header.php'); ?>	 

<div class="row">

	<div class="col-md-12 text-center" style="margin-top: 80px;">
		 <h1 class="divH">Welcome to Indian Language Report Demo</h1>	
	</div>

	<div class="col-md-12 text-center" style="margin-top: 40px;">

		<?php foreach ($languages as $language) { ?>
					
			<a style="margin-right: 5px;"
				data-toggle="tooltip" 
				title="<?php echo $language->state; ?>!" 
				href='<?php echo site_url("home/language/$language->id/$language->lang_short");?>'>
				<?php echo $language->lang;?>
			</a>

		<?php } ?>
	     	    	 	
	</div>
</div>
	
 
<?php include('partials/footer.php'); ?>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

