
<?php
include ("adminBack.php");

$obj_Adminback = new adminBack();
if (isset($_POST['submit'])) {
 $obj_Adminback->admin_login($_POST);
}


?>
<?php include('header.php');?>


<!--Home-started-->
	<section id="getstarted" class="py-5 text-center text-light">
		<div class="dark-overlay">
			<div class="container">
			<div class="row">
				<!--<div class="col-md-6 class">
					<h1>PhoneBook</h1>
				<form class="form" action="" method="POST">
					<div class="form-group text-center">
						<input type="text" name="email" placeholder="Enter your Email" class="form-control text-center">
						
					</div>
					<div class="form-group text-center">
						<input type="password" name="password" placeholder="Enter your password" class="form-control text-center">
						
					</div>
					<input type="submit" name="submit" value="Log In" class="btn btn-info">
					
				</form>
				</div>-->
				<div class="login-box">
  <h2>PhoneBook</h2>
  <form class="" method="POST" action="">
    <div class="user-box">
      <input type="email" name="email" placeholder="Username" class="text-center">

    </div>
    <div class="user-box">
      <input type="password" name="password" placeholder="Password"class="text-center">
    
    </div>
  <input type="submit" name="submit" value="Log In" class="btn btn-info">
  </form>
</div>
				
			</div>
			</div>
			
		</div>
		
	</section>









	<!--Footer-->


<?php include('footer.php');?>