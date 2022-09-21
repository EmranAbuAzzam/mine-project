

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>


<body style="margin: 0px;">


  
  
    <table class="table">
        <thead>
			<tr>
				
				<th>Email address</th>
	
				<th>First Name</th>
				<th>Middle Name</th>
                <th>Last Name</th>
                <th>Family Name</th>
                <th>mobile</th>
                <th>Date of Birth</th>
                <th>Password</th>
                <th>Confirm Password</th>
                <th>Action</th>
				
			</tr>
            
		</thead>

        <tbody>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="admin";
// Create connection
$conn = new mysqli($servername, $username, $password,$db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


            
            $sql = "SELECT * FROM adminuser";

              

            $result = $conn->query($sql);

            

            // read data of each row
			while($row = $result->fetch_assoc()) {
                echo "<tr>
                    
                    <td>" . $row["email_address"] . "</td>
                  
                  
                    <td>" . $row["first_name"] . "</td>
                    <td>" . $row["middle_name"] . "</td>
                    <td>" . $row["last_name"] . "</td>
                    <td>" . $row["family_name"] . "</td>
                    <td>" . $row["mobile"] . "</td>
                    <td>" . $row["date_of_birth"] . "</td>
                    <td>" . $row["password"] . "</td>
                    <td>" . $row["confirm_password"] . "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='update'>Update</a>
                        <a class='btn btn-danger btn-sm' href=''>Delete</a>
                    </td>
                </tr>";
            }

            ?>
           
        </tbody>
    </table>
      
        
       
        
   
    
</body>
</html>