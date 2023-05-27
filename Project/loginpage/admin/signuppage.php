<?php
$register=null;

if(isset($_POST['dep']) && isset($_POST['uname']) && isset($_POST['email'])&& isset($_POST['utype']) && isset($_POST['phone'])&& isset($_POST['password'])){
	$dep = $_POST['dep'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$utype = $_POST['utype'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];	
	$password = password_hash($password, PASSWORD_DEFAULT);
	//Database connection
	$conn = new mysqli('localhost', 'root', '', 'kuims');
	if($conn->connect_error){
		die('Connection Failed  : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into registration(department, user_name, email, phone_no, password, type)
			values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiss", $dep, $uname, $email, $phone, $password, $utype);
		$stmt->execute();
		$register= "User Registered";
		return header("Location:http://localhost/Project/loginpage/admin/signuppage.php"); 
		$stmt->close();
		$conn->close();
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="CSS/style.css">
	<link rel="stylesheet" href="../CSS/style.css">
	<title>Admin Dashboard</title>
	<link rel="icon"  href="image/logo.png" type="image/png">
    <script type="text/javascript" src="JS/script.js"></script>
</head>
<body bgcolor="#0965bc">

	<div class="wrapper">
    <div class="sidebar">
        <h2>Hello Admin</h2>
        <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="order.php">Order</a></li>
            <li><a href="return.php">Return</a></li>
            <li><a href="contacts.php">Contacts</a></li>
            <li><a href="instock.php">Instock</a></li>
            <li><a href="request.php">Requested Orders</a></li>
            <li><a href="returnreq.php">Return Request</a></li>
            <li><a href="signuppage.php">Register User</a></li>
            <li><a href="../loginpage.php">Logout</a></li>
        </ul> 
        <div class="social_media">
          <a href="https://www.facebook.com/"><img src="image/fb.png" height="20px" width="20px"></a>
          <a href="https://www.instagram.com/ims.ku023/?fbclid=IwAR2X5_ZtqNu5g43tgyUeT_XcqcKLK48Mln_uyM-z94D9Pk1z0Mf4beiU0kY"><img src="image/insta.jpg" height="20px" width="20px"></a></li>
          <a href="https://www.twitter.com"><img src="image/twitter.png" height="20px" width="20px"></a>
      </div>
    </div>

    <div class="main_content">
        <div class="header"> Welcome Admin!!!</div>  
       	

        <div class="split-screen">
        <div class="left">
            <section class="copy">

                <h1>Return</h1>
                <p>Want to get a detailed overview of your orders?</p>
                <img src="image/register.jpg" alt="KU-IMS.com" height>
                
            </section>
        </div>
       <div class="right">
            <form onsubmit="return validate();" action="#" method="post" >
                <section class="copy">
                    
                    <div class="login-contain">
                    <h3 style="color: Green;">  <?php echo $register  ?></h3>
                            <strong>Register User!!!</strong>
                        </a></p>
                    </div>
                </section>

                <div class="input-contain department">
					<label for="dep"> Department</label>
					<input id="dep" name="dep" type="dep">
				</div>
				<div class="input-contain username">
					<label for="uname"> UserName</label>
					<input id="uname" name="uname" type="text">
				</div>

				<div class="input-contain email">
					<label for="email"> Email</label>
					<input id="email" name="email" type="email">
				</div>
				<div class="input-contain username">
					<label for="utype"> User Type</label>
					<select id="email" name="utype" type="utype">
						<option>Admin</option>
						<option>User</option>
					</select>
				</div>
				<div class="input-contain phone">
					<label for="phone"> Phone No.</label>
					<input id="phone" name="phone" type="phone">
				</div>
				<div class="input-contain password">
					<label for="password"> Password</label>
					<input id="password" name="password" 
					placeholder="at least 8 character" type="password">
					<i class="fa-solid fa-eye"></i>	
				</div>
				
				<button class="signin-but" type="submit"> Sign Up</button>



            </form>
            
        </div>

    </div>
</div>

</body>
</html>
