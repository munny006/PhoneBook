<?php

class adminBack{

	private $conn;
	public function __construct(){
		$dbhost = "localhost";
		$dbuser ="root";
		$dbpass ="";
		$dbname ="phonebook";
		$this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		if (!$this->conn) {
			die("Database connection Error!");
		}
	}

//Login function
	function admin_login($data){
		$email = $data['email'];
		$password = md5($data['password']);
		$query = "SELECT  * FROM login WHERE email='$email' AND password='$password'";
		if (mysqli_query($this->conn,$query)) {
			$result = mysqli_query($this->conn,$query);
			$admin_info = mysqli_fetch_assoc($result);
			if ($admin_info) {
				header('location:add-cat.php');
				session_start();
				$_SESSION['id'] =$admin_info['id'];
				$_SESSION['email'] =$admin_info['email'];
				$_SESSION['password'] =$admin_info['password'];
			}
			else
			{
				$errmsg = "Your Username  or password incorrect";
				return $errmsg;
			}
		
}
}

//add_category
function add_product($data){
		$pdt_name = $data['ctg_name'];
		$pdt_email = $data['ctg_email'];
		$pdt_number = $data['ctg_number'];
		$pdt_city = $data['city_name'];
		$pdt_img_name = $_FILES['ctg_img']['name'];
		$pdt_img_size = $_FILES['ctg_img']['size'];
		$pdt_tmp_name = $_FILES['ctg_img']['tmp_name'];
		$pdt_ext = pathinfo($pdt_img_name,PATHINFO_EXTENSION);
		
		
		if ($pdt_ext == 'jpg' or $pdt_ext == 'png' or $pdt_ext == 'jpeg') {
			if ($pdt_img_size <=2097152) {
$query = "INSERT INTO information(ctg_name,ctg_email,ctg_number,ctg_img,city_name) VALUES('$pdt_name','$pdt_email',$pdt_number,'$pdt_img_name','$pdt_city')";
if (mysqli_query($this->conn,$query)) {
					move_uploaded_file($pdt_tmp_name,'uploads/'.$pdt_img_name);
					$msg = "Data added successfully!";
					return $msg;
					
				}
			}
			else{
				$msg="Your file size should be less or equal 2MB!";
			}
		}
		else{
			$msg="Your file mustbe a jpg/png file";
			return $msg;
		}


	}


//show or read
function display_product(){
		$query = "SELECT * FROM information";
		if (mysqli_query($this->conn,$query)) {
			$product = mysqli_query($this->conn,$query);
			return $product;
			 
		}
	}

//delete
	function delete_product($id){
		$query = "DELETE FROM information WHERE ctg_id=$id";
		if (mysqli_query($this->conn,$query)) {
			$msg = "Data Deleted successfully!";
			return $msg;
		}

	}
	
	
function getEditProduct_info($id){
		$query = "SELECT * FROM information WHERE ctg_id = $id";
		if (mysqli_query($this->conn,$query)) {
				$product_info=mysqli_query($this->conn,$query);
				$pdt_data = mysqli_fetch_Assoc($product_info);
				return $pdt_data;
		}


	}
	
function update_product($data){
$pdt_id = $data['u_pdt_id'];	
$pdt_name = $data['u_pdt_name'];
		$pdt_email = $data['u_pdt_email'];
		$pdt_number = $data['u_pdt_number'];
		$pdt_city = $data['u_pdt_city'];
		
		$pdt_img_name = $_FILES['u_pdt_img']['name'];
		$pdt_img_size = $_FILES['u_pdt_img']['size'];
		$pdt_tmp_name = $_FILES['u_pdt_img']['tmp_name'];
		$pdt_ext = pathinfo($pdt_img_name,PATHINFO_EXTENSION);
		
		if ($pdt_ext == 'jpg' or $pdt_ext == 'png' or $pdt_ext == 'jpeg') {
			if ($pdt_img_size <=2097152) {
				$query = "UPDATE information SET ctg_name='$pdt_name',ctg_email='$pdt_email',ctg_number=$pdt_number,ctg_img='$pdt_img_name',city_name='$pdt_city' WHERE ctg_id =$pdt_id";
				if (mysqli_query($this->conn,$query)) {
					move_uploaded_file($pdt_tmp_name,"uploads/".$pdt_img_name);
					$msg = "Data updated successfully!";
					return $msg;
					
				}
			}
			else{
				$msg="Your file size should be less or equal 2MB!";
			}
		}
		else{
			$msg="Data updated successfully";
			return $msg;
		}
		

}

	
}
	?>