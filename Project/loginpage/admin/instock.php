

<?php
include('./header.php')

?>
    <div class="main_content">
        <div class="header"> Welcome Admin!!!</div>  
        <h2 style="text-align: center; color: grey; font-size: 50; "> In Stock</h2>
    

        <section id="services-container">
         	<table border="2" style="align-content: center; width: 50%; margin-left:auto; margin-right:auto; text-align: center;" >
         		<tr>
                    <th>ID</th>
         			<th>Category</th>
         			<th>Item</th>
                    <th>Item Number</th>
                    <th colspan="2">Operation</th>
         		</tr>
         		<?php
         			$conn = mysqli_connect("localhost", "root", "", "kuims");
         			$sql = "select * from stock";
         			$result = $conn-> query($sql);

         			if ($result->num_rows > 0){
         				while ($row = $result-> fetch_assoc()) {
         					echo "<tr> <td>" .$row["id"] . "</td><td>" 
         					.$row["category"] . "</td><td>" 
         					.$row["item_name"] . "</td><td>"
         					.$row["item_number"] . "</td>
                            <td><button><a onClick=\"javascript: return confirm('Currently update not possible')\";>Update</a><button></td>
                            <td><button><a onClick=\"javascript: return confirm('Are you sure to delete?')\"; href='stockdelete.php?id={$row['id']}'>Delete</a><button></td>";

                           
         			}
                }else {
                    echo ("No result");
                }
         			$conn-> close();
                
         		?>
         	</table>
            <h3 style="text-align: center; "><a href="inventory.php">Click here to add inventory</a></h3>

           
    
            </div>

    </div>
</div>

</body>
</html>

