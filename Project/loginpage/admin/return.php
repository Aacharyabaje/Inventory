<?php
$complete= null; 

if(isset($_POST['dep']) && isset($_POST['cate']) && isset($_POST['name']) && isset($_POST['num'])&& isset($_POST['odate']) 
&& isset($_POST['rdate']) && isset($_POST['reason'])){
	$dep = $_POST['dep'];
	$cate = $_POST['cate'];
	$name = $_POST['name'];
	$num = $_POST['num'];
	$odate = $_POST['odate'];	
	$rdate = $_POST['rdate'];
	$reason = $_POST['reason'];

	//Database connection
	$conn = new mysqli('localhost', 'root', '', 'kuims');
	if($conn->connect_error){
		die('Connection Failed  : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into returns(department, category, item_name, return_number, order_date, return_date, reason)
			values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssisss", $dep, $cate, $name, $num, $odate, $rdate, $reason);
		$stmt->execute();
        $complete= "Return placed Successfully";
		$stmt->close();
		$conn->close();
	}

}
?>

<?php
include('./header.php')

?>

    <div class="main_content">
        <div class="header"> Welcome Admin!!!</div>  
       	

        <div class="split-screen">
        <div class="left">
            <section class="copy">

                <h1>Return</h1>
                <p>Want to get a detailed overview of your orders?</p>
                <img src="image/return1.jpeg" alt="KU-IMS.com" height>
                
            </section>
        </div>
       <div class="right">
            <form onsubmit="return validate();" action="#" method="post" >
                <section class="copy">
                    
                    <div class="login-contain">
                    <h3 style="color: Green;">  <?php echo $complete  ?></h3>
                            <strong>Return Here!!!</strong>
                        </a></p>
                    </div>
                </section>

                <div class="input-contain department">
                     <label for="dep"> Department</label>
                    <select id="dep" name="dep" type="text">
                        <option>DOMIC</option>
                        <option>Architecture</option>
                        <option>Computer Engineering</option>
                        <option>Pharmacy</option>
                    </select>
                </div>
                <div class="input-contain cate">
                    <label for="cate"> Category </label>
                    <Select id="cate" name="cate" type="text">
                        <option>Furniture</option>
                        <option>Stationary</option>
                    </Select>
                </div>

                <div class="input-contain name">
                    <label for="name"> Item Name</label>
                    <input id="name" name="name" type="text">
                </div>
                <div class="input-contain num">
                    <label for="num"> Return Number</label>
                    <input id="num" name="num" type="text">
                </div>
                 <div class="input-contain odate">
                    <label for="odate"> Order Date</label>
                    <input id="odate" name="odate" type="text" placeholder="eg. jan1">
                </div>
                <div class="input-contain rdate">
                    <label for="rdate"> return Date</label>
                    <input id="rdate" name="rdate" type="text" placeholder="eg. jan1">
                </div>
                <div class="input-contain reason">
                    <label for="reason"> Reason</label>
                    <input id="reason" name="reason" type="text">
                </div>
                
                
                
                <button class="signin-but" type="submit"> Return</button>



            </form>
            
        </div>

    </div>
</div>

</body>
</html>




