<?php
include ("adminBack.php");
$obj_adminBack = new adminBack();
if (isset($_GET['prostat'])) {
	$id = $_GET['id'];
	if ($_GET['prostat'] == 'edit') {
		$pdt_info = $obj_adminBack->getEditProduct_info($id);

	}

}
if (isset($_POST['u_pdt_btn'])) {

	$update_msg = $obj_adminBack->update_product($_POST);
}


?>

<form class="form col-md-6 right bg-light py-5 my-2" method="POST" action="" enctype="multipart/form-data">
	<h2 class="text-center">Update !!!</h2>
	<?php

if (isset($update_msg)) {
	echo $update_msg;
}

?>
<?php include('header.php');?>
	<div class="form-group">
	
		<input hidden type="text" name="u_pdt_id" class="form-control" value="<?php echo $pdt_info['ctg_id'];?>">
		
	</div>
	<div class="form-group">
		
		<input type="text" name="u_pdt_name" class="form-control" >
	</div>
		<div class="form-group">
		
		<input type="email" name="u_pdt_email" class="form-control" value="<?php echo $pdt_info['ctg_email'];?>">
	</div>
	<div class="form-group">
		
		<input type="tel" name="u_pdt_number" class="form-control" value="<?php echo $pdt_info['ctg_number'];?>">
		
	</div>

	<div class="form-group">
		
		<input type="file" name="u_pdt_img" class="form-control" value="<?php echo $pdt_info['ctg_img'];?>">
	</div>
	<div class="form-group">
		
		<input type="text" name="u_pdt_city" class="form-control" value="<?php echo $pdt_info['city_name'];?>">
	</div>
	
	<input type="submit" name="u_pdt_btn" value="Update" class="btn btn-success">
	

<a href="add-cat.php" class="btn btn-success ml-4  ">Back</a>
</form>


<?php include('footer.php');?> 