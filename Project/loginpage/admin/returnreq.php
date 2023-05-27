

<?php
include('./header.php')

?>
    <div class="main_content">
        <div class="header"> Welcome Admin!!!</div>  
        <h2 style="text-align: center; color: grey; font-size: 50; "> Returned Orders</h2>

        <section id="services-container">
         	<table border="2" style= "width: 50%; margin-left:auto; margin-right:auto; text-align: center;" >
         		<tr>
					<th> ID </th>
         			<th>Department</th>
         			<th>Category</th>
         			<th>Item Name</th>
         			<th>Return Number</th>
         			<th>Order Date</th>
                    <th>Return Date</th>
                    <th>Reason</th>
                    <th colspan="2">Operation</th>

         		<?php
         			$conn = mysqli_connect("localhost", "root", "", "kuims");
         			$sql = "select * from returns";
         			$result = $conn-> query($sql);

         			if ($result->num_rows > 0){
         				while ($row = $result-> fetch_assoc()) {
         					echo "<tr> <td>" .$row["id"] . "</td><td>" 
							 .$row["department"] . "</td><td>" 
         					.$row["category"] . "</td><td>" 
         					.$row["item_name"] . "</td><td>"
         					.$row["return_number"] . "</td><td>"
         					.$row["order_date"] . "</td><td>"
                            .$row["return_date"] . "</td><td>"
                            .$row["reason"] . "</td>
                            <td><button><a onClick=\"javascript: return confirm('Currently update not possible')\";>Update</a><button></td>
                            <td><button><a onClick=\"javascript: return confirm('Are you sure to accept?')\"; href='returndelete.php?id={$row['id']}'>Accept Return</a><button></td>";
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

