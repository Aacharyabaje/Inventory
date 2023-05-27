

<?php
include('./header.php')

?>
    <div class="main_content">
        <div class="header"> Welcome Admin!!!</div>  
        <h2 style="text-align: center; color: grey; font-size: 50; "> Requested Orders</h2>

        <section id="services-container">
         	<table border="2" style="align-content: center; width: 50%; margin-left:auto; margin-right:auto; text-align: center;" >
         		<tr>
					<th>ID </th>
         			<th>Department</th>
         			<th>Category</th>
         			<th>Item Name</th>
         			<th>Desired Number</th>
         			<th>Order Date</th>
                    <th colspan="2">Operation</th>
         		</tr>
         		<?php
         			$conn = mysqli_connect("localhost", "root", "", "kuims");
         			$sql = "select * from orderdetails";
         			$result = $conn-> query($sql);

         			if ($result->num_rows > 0){
         				while ($row = $result-> fetch_assoc()) {
         					echo "<tr> <td>" .$row["id"] . "</td><td>" 
							 .$row["department"] . "</td><td>" 
         					.$row["category"] . "</td><td>" 
         					.$row["item_name"] . "</td><td>"
         					.$row["desired_number"] . "</td><td>"
         					.$row["order_date"] . "</td>
                            <td><button><a onClick=\"javascript: return confirm('Currently update not possible')\";>Update</a><button></td>
                            <td><button><a onClick=\"javascript: return confirm('Are you sure to release?')\"; href='requestdelete.php?id={$row['id']}'>Release Order</a><button></td>";
         				}
         			} else{
         				echo "No Result";
         			}
         			$conn-> close();
         		?>
         	</table>
           
    
            </div>

    </div>
</div>

</body>
</html>

