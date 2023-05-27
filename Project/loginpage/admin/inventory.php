<?php
   $complete= null; 
   
   if(isset($_POST['cate']) && isset($_POST['name']) && isset($_POST['num'])){
	
	$cate = $_POST['cate'];
	$name = $_POST['name'];
	$num = $_POST['num'];
	
    

	//Database connection
	$conn = new mysqli('localhost', 'root', '', 'kuims');
	if($conn->connect_error){
		die('Connection Failed  : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into stock(category, item_name, item_number)
			values(?, ?, ?)");
		$stmt->bind_param("ssi",$cate, $name, $num);
		$stmt->execute();
		$stmt->close();
		$conn->close();
        return header("Location:instock.php");
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
                <h1 style="color: white" >Add Inventory</h1> 
                <p>You can add the added number of inventory from this portal.</p>
               
               <img src="image/inventory.png" alt="KU-IMS.com">
                
            </section>
        </div>
       <div class="right">
            <form onsubmit="return validate();" action="#" method="post" >
                <section class="copy">
                    
                    <div class="login-contain">
                    <h3 style="color: Green;">  <?php echo $complete  ?></h3>
                        
                            <strong>Add Inventory</strong>
                        </a></p>
                    </div>
                </section>

                <div class="input-contain cate">
                    <label for="cate"> Category </label>
                    <input id="cate" name="cate" type="text">
                </div>

                <div class="input-contain name">
                    <label for="name"> Item Name</label>
                    <input id="name" name="name" type="text">
                </div>
                <div class="input-contain num">
                    <label for="num"> Item Number</label>
                    <input id="num" name="num" type="text">
                </div>
                
                
                <button class="signin-but" type="submit"> Submit</button>
               


            </form>
            
        </div>

    </div>
</div>

</body>
</html>



