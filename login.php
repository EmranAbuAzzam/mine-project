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

if(isset($_POST['submit'])){
    
    $uname=$_POST['email'];
    $password=$_POST['password'];
    
    $sql = "SELECT * FROM adminuser WHERE email_address='$uname' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['email_address'] == $uname && $row['password'] == $password && $row['type']=='admin')  {
        echo "Logged in!<br>";
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['id'] = $row['ID'];
    
        header("location:welcome.php"); 
    }

    if ($row['email_address'] == $uname && $row['password'] == $password && $row['type']==NULL) {
        echo "Logged in!<br>";
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['id'] = $row['ID'];
    
        header("location:welcomeuser.php") ;
    }
}
?>



<!DOCTYPE html>
<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="stylesheet" a href="css\font-awesome.min.css">
    <style>
        body{
	margin: 0 auto;
	background-image: url("../image/technology.jpg");
	background-repeat: no-repeat;
	background-size: 100% 720px;
}

.container{
	width: 500px;
	height: 450px;
	text-align: center;
	margin: 0 auto;
	background-color: rgba(44, 62, 80,0.7);
	margin-top: 160px;
}

.container img{
	width: 150px;
	height: 150px;
	margin-top: -60px;
}

input[type="text"],input[type="password"]{
	margin-top: 30px;
	height: 45px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 40px;
}

.form-input::before{
	content: "\f007";
	font-family: "FontAwesome";
	padding-left: 07px;
	padding-top: 40px;
	position: absolute;
	font-size: 35px;
	color: #2980b9; 
}

.form-input:nth-child(2)::before{
	content: "\f023";
}

.btn-login{
	padding: 15px 25px;
	border: none;
	background-color: #27ae60;
	color: #fff;
}
    </style>
</head>
<body>
	<div class="container">
	<img src="image/login.png"/>
		<form method="POST">
			<div class="form-input">
				<input type="email" name="email" placeholder="Enter the User email"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password"/>
			</div>
			<input type="submit" name="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>