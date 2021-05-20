<?php
include ("adminBack.php");
$obj_adminBack = new adminBack();
if (isset($_POST['submit'])) {
	$return_msg = $obj_adminBack->add_product($_POST);
}


?>




<?php 

if (isset($return_msg)) {
	echo  $return_msg;
}

?>
<?php include('header.php');?>
<h1 class="text-center mt-5">Add Contact</h1><br>
<div>
<form action="" method="POST" class="col-md-6 right bg-light py-5 my-2" enctype="multipart/form-data">
		
	<div class="form-group">
		
		<input type="text" name="ctg_name" class="form-control" placeholder="Enter Your Name">
		
	</div>
		<div class="form-group">
		
		<input type="text" name="ctg_email" class="form-control" placeholder="Enter Your Email">
		
	</div>
		<div class="form-group">
		<input type="tel" name="ctg_number" class="form-control" placeholder="Enter Your Number">
		
		
	</div>
	<div class="form-group">
		<input type="file" name="ctg_img" class="form-control">
		
		
	</div>
		<div class="form-group">
	
		
		<select name = "city_name">


			<option>Sylhet</option>
			<option>Hobigong</option>
			<option>Comilla</option>
			<option>Rajshahi</option>
			<option>Chittagong</option>
			<option>Dhaka</option>
			
		</select>
	
	</div>
	<input type="submit" name="submit" value="Add" class="btn btn-primary">
<a href="add-cat.php" class="btn btn-success ml-4 ">Back</a>
	
</form>
</div>


