<?php include('partials/header.php'); ?>	 

<div class="row">

	 <h3 class="text-center"><?php echo $all_employee_records;?></h3>
	<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3" style="margin-top: 35px;">

		<table class="table table-bordered">
			<thead>
				<tr>
					<th><?php echo $srno;?></th>
					<th><?php echo $employeename;?></th>
					<th><?php echo $designation;?></th>
					<th><?php echo $salary;?></th>
				</tr>
			</thead>

			<tbody>

			 <?php
			 	$cnt = 1;
			 	foreach ($employees as $employee) {?>		 		
			 		<tr>				
						<td><?php echo $cnt++; ?></td>	
						<td><?php echo $employee->name; ?></td>	
						<td><?php echo $employee->des; ?></td>	
						<td><?php echo $employee->salary; ?></td>	
					</tr>		 		
			 	<?php }		  	
			  ?>		
				
			</tbody>
		</table>		 
	</div>

	<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3" style="margin-top: 35px;">

		 <a href='<?php echo site_url("home/printAReport/$employee->lang_id");?>' class="btn btn-default">Print Employee Report</a>
		 
	</div>

</div>
	
 
<?php include('partials/footer.php'); ?>

 

