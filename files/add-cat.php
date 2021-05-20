<?php
include ("adminBack.php");
$obj_adminBack = new adminBack();
$product_info = $obj_adminBack->display_product();
$search_value ='';

?>
<?php

if (isset($_GET['prostat'])) {
	$proid = $_GET['id'];
	if ($_GET['prostat'] == 'delete') {

$msg = $obj_adminBack->delete_product($proid);
	}
}


if(isset($_REQUEST['btn'])){
	$search_value=$_REQUEST["search"];
	$con=new mysqli('localhost','root','','phonebook');
	if($con->connect_error){
    echo 'Connection Faild: '.$con->connect_error;
    }else{
       $sql=" SELECT * FROM information WHERE ctg_name like '%".$search_value."%' OR ctg_email like '%".$search_value."%' OR ctg_number like '%".$search_value."%' OR ctg_img like '%".$search_value."%' OR city_name like '%".$search_value."%'";

        $res=$con->query($sql);

		//print_r($res);

        // while($row=$res->fetch_assoc()){
        //     echo 'First_name:  '.$row["ctg_name"];


        //     }     

        
		}
}




?>

<?php
if (isset($msg)) {
	echo $msg;
}


?>
<?php include('header.php');?>
<h1 class="text-center bg-light py-3 mt-2"> Hey!!! I'm Here</h1>

<table class="table table-bordered  text-dark bg-light col-md-10 ml-5">
	<tr class="text-center">
			<form action="" method="POST" class="right bg-light py-5 my-2" enctype="multipart/form-data">
				<div class="form-group col-md-3" style="width: 20%;margin-left:11%;margin-top: 3%;">
					<input type="text" name="search" value="<?php echo $search_value; ?>" class="form-control" placeholder="Search By Name">
					</div>
					<div class="form-group col-md-3"style="margin-left: 33%;margin-top: -3.3%;">
					<input type="submit" name="btn" value="Search" class="btn btn-dark">
				</div>
			</form>
				
		<th width="14%">Name</th>
		<th width="17%">Email</th>
		<th width="17%">phone</th>
		<th width="17%">Image</th>
		<th width="15%">city Name</th>
	
		<th width="30%">Action</th>
	</tr>
	<?php
		if(isset($res)){
			while($row=$res->fetch_assoc()) {
				?>

				<tr class="text-center">
				
				<td><?php echo $row['ctg_name'];?></td>
				<td><?php echo $row['ctg_email'];?></td>
				<td><?php echo $row['ctg_number'];?></td>
				<td><img  style="height:50px;" src="uploads/<?php echo $row['ctg_img'];?>"></td>
				<td><?php echo $row['city_name'];?></td>


				<td>
					<a href="update.php?prostat=edit&&id=<?php echo $row['ctg_id'];?>" class = "btn btn-success">Update</a>
					<a href="?prostat=delete&&id=<?php echo $row['ctg_id'];?>" class = "btn btn-danger" >Delete</a>

				</td>
			</tr>
		<?php } 
		}else{
			while ($product =mysqli_fetch_assoc($product_info)) {
				?>

				<tr class="text-center">
				
				<td><?php echo $product['ctg_name'];?></td>
				<td><?php echo $product['ctg_email'];?></td>
				<td><?php echo $product['ctg_number'];?></td>
				<td><img  style="height:50px;" src="uploads/<?php echo $product['ctg_img'];?>"></td>
				<td><?php echo $product['city_name'];?></td>
				<td>
					<a href="update.php?prostat=edit&&id=<?php echo $product['ctg_id'];?>" class = "btn btn-success">Update</a>
					<a href="?prostat=delete&&id=<?php echo $product['ctg_id'];?>" class = "btn btn-danger" >Delete</a>

				</td>
			</tr>
		<?php } 
		} ?>
		
</table>



















<?php include('footer.php');?>

<div class="bg-light py-3 mt-3">
<a href="index.php" class="btn btn-success ml-4 ">Back</a>
<a href="login.php" class="btn btn-primary pull-right mr-4">Next</a>
</div>