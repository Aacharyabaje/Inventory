<?php
   $complete= null; 
   
   if(isset($_POST['dep']) && isset($_POST['cate']) && isset($_POST['name']) && isset($_POST['num'])&& isset($_POST['odate'])){
	$dep = $_POST['dep'];
	$cate = $_POST['cate'];
	$name = $_POST['name'];
	$num = $_POST['num'];
	$odate = $_POST['odate'];	
    

	//Database connection
	$conn = new mysqli('localhost', 'root', '', 'kuims');
	if($conn->connect_error){
		die('Connection Failed  : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into orderdetails(department, category, item_name, desired_number, order_date)
			values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssis", $dep, $cate, $name, $num, $odate);
		$stmt->execute();
        $complete= "Order place Successful";
		$stmt->close();
		$conn->close();
	}

}
    ?>

<?php
include('./header.php')

?>
    <div class="main_content">
        <div class="header"> Welcome User!!!</div>  
       	

     
        <div class="split-screen">
		<div class="left">
        <section class="copy">
                <h1 style="color: white" >Order</h1> 
                <p>You can order the required number of inventory from this portal.</p>
               
               <img src="image/order.png" alt="KU-IMS.com">
                
            </section>
        </div>
       <div class="right">
            <form onsubmit="return validate();" action="#" method="post" >
                <section class="copy">
                    
                    <div class="login-contain">
                    <h3 style="color: Green;">  <?php echo $complete  ?></h3>
                        
                            <strong style="color: black; ">Order Here!!!</strong>
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
                    <label for="num"> Desired Numbers</label>
                    <input id="num" name="num" type="text">
                </div>
                 <div class="input-contain odate">
                    <label for="odate"> Order Date</label>
                    <input id="odate" name="odate" type="text" placeholder="eg. jan1">
                </div>
                
                <div class="input-contain cta">
                    <label class="checkbox-contain">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        Remember Details
                    </label>
                </div>
                <button class="signin-but" type="submit"> Place Request</button>
                <section class="copy legal">
                    <p><span class="small">By continuing, you agree to accept our<br>
                    <a href="#"> Privacy Policy</a> & <a href="#">Terms of Service</a> </span></p>
                </section>


            </form>
            
        </div>

    </div>
</div>

</body>
</html>



