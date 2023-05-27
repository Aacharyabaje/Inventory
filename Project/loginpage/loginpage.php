<?php 
	session_start();
	
	$emailErr = "";
	$passErr = "";
	$error= null;
	
	if(isset($_POST['email']) && isset($_POST['password'])){


	$email = $_POST['email'];
	$password = $_POST['password'];	
	 if($email == ""){
            $emailErr =  "Enter email";
        }
        if($password == ""){
            $passErr = "Password missing";
        }

	
	//Database connection
	$conn = new mysqli('localhost', 'root', '', 'Jagadamba Stock Management System');
	
	if($conn->connect_error){
		die('Connection Failed  : '.$conn->connect_error);
	}else {
		$stmt = $conn->prepare("select * from registration where email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if($stmt_result->num_rows > 0){
			$data = $stmt_result->fetch_assoc();
			$verfy =password_verify($password,$data['password'] );
			if($verfy==1){

			// if($data['password'] === $password){
					// return header("Location:http://localhost/Project/loginpage/user/dashboard.php"); 

				if($data['type'] === "Admin"){
					
					
					return header("Location:http://localhost/Project/loginpage/admin/dashboard.php"); 
					die();
					// echo "<h3> Welcome Admin !!! </h3>";
					// echo "<a href='admin/dashboard.php'>Click Here to Redirect to Dashboard</a> ";
				}else{

					
					return header("Location:http://localhost/Project/loginpage/user/dashboard.php"); 
					die();
					// echo "<h3> Welcome User !!! </h3>";
					// echo "<a href='user/dashboard.php'>Click Here to Redirect to Dashboard</a> ";
				}
			}else{
				$error= "Invalid Email or password ";
				// echo "<a href='loginpage.html'>Click to try again</a> "; 
			}
		}else{
			$error= "Invalid Email";
			// echo "<h2> Invalid Email or password </h2>";
			// echo "<a href='loginpage.html'>Click to try again</a> ";
		}
	}


}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="CSS/style.css">
	<link rel="stylesheet" href="./../website/css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
	<title>Form page</title>
	<link rel="icon"  href="image/logo.png" type="image/png">
	<script type="text/javascript" src="JS/script.js"></script>
	
</head>
<body>
	<nav id="navbar">
        <div id="logo">
            <img src="image/logo.png" alt="JIMS.com">
        </div>
        <ul>
            <li class="item"><a href="../website/index.php">Home</a></li>
            <li class="item"><a href="../website/services.php">Services</a></li>
            <li class="item"><a href="../website/clients.php">Our Clients</a></li>
            <li class="item"><a href="../website/contacts.php">Contact Us</a></li>
            <li class="item"><a href="../website/about.php">About Us</a></li>
            <li id="info">Visit Us on:</li>
            <li><a href="https://www.facebook.com/" target="_blank"><img src="image/fb.png" height="20px" width="20px"></a></li>
            <li><a href="https://www.instagram.com/ims.233/" target="_blank"><img src="image/insta.jpg" height="20px" width="20px"></a></li>
            <li><a href="https://www.twitter.com" target="_blank"><img src="image/twitter.png" height="20px" width="20px"></a></li>
            
			
        </ul>
    </nav>
	<div class="split-screen">
		<div class="left">
			<section class="copy">

				<h1>Inventory Management System</h1>
				<p>Your inventory is our responsibility</p>
				<img src="image/1.jpeg">
			</section>
		</div>
		<div class="right">
			<form onsubmit="return validate();" action="#" method="post">
				<section class="copy">
						<p style="color: red;"> <?php
						echo $error; 
						?></p>
					<h2>Log In</h2>
<!-- 					<div class="login-contain">
						<p>Using for the first time? <a href="signuppage.html"> 
							<strong>Sign Up</strong>
						</a></p>
					</div> -->
				</section>
				<div class="input-contain email">
					<span style="color: red"><?php echo $emailErr ?></span>
					<label for="email"> Email</label>
					<input id="email" name="email" type="email">
				</div>
				<div class="input-contain password">
				<span style="color: red">	<?php echo $passErr ?></span>
					<label for="password"> Password</label>
					<input id="password" name="password" 
					placeholder="at least 8 character" type="password">
					<i class="fa-solid fa-eye"></i>
					
				</div>
				<div class="input-contain cta">
					<label class="checkbox-contain">
						<input type="checkbox">
						<span class="checkmark"></span>
						Remember Me
					</label>
				</div>
				<button class="signin-but" type="submit"> Sign in</button>
				<section class="copy legal">
					<p><span class="small">By continuing, you agree to accept our<br>
					<a href="#"> Privacy Policy</a> & <a href="#">Terms of Service</a> </span></p>
				</section>


			</form>
			
		</div>

</body>
</html>

