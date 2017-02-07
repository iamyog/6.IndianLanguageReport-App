<?php include('partials/header.php'); ?>	 

<div class="row">

	<h2 class="text-center"><?php echo $message; ?></h2>
	<div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4" style="margin-top: 35px;">

	<?php 
		if($this->session->flashdata('msg_success'))
		{?>
			<div class="alert alert-success text-center">			 
				<?php echo $this->session->flashdata('msg_success');?>
			</div>
		<?php }
		if($this->session->flashdata('msg_failed'))
		{?>
			<div class="alert alert-danger text-center">
			 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $this->session->flashdata('msg_failed');?>
			</div>
		<?php }
	?>

		 <form method="post" action="<?php echo site_url('home/addEmployee'); ?>">
		 <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $id;?>">
		  <input type="hidden" name="hidden_lang" id="hidden_lang" value="<?php echo $lang;?>">
			  <div class="form-group">
			    <label for="exampleInputName"><?php echo $txt_employee_name; ?></label>
			    <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo $place_employee_name;?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputDes"><?php echo $txt_employee_des;?></label>
			    <input type="text" class="form-control" id="des" name="des" placeholder="<?php echo $place_employee_des;?>">
			  </div>
			   <div class="form-group">
			    <label for="exampleInputSalary"><?php echo $txt_employee_salary;?></label>
			    <input type="text" class="form-control" id="salary" name="salary" placeholder="<?php echo $place_employee_salary;?>">
			  </div>
			 
			  <button type="submit" class="btn btn-default"><?php echo $btn_employee_save;?></button>
			   <a href='<?php echo site_url("home/showMeAllEmployees/$id/$lang"); ?>' class="btn btn-default"><?php echo $show_employees;?></a>
</form>
	</div>

</div>
	
 
<?php include('partials/footer.php'); ?>

 

