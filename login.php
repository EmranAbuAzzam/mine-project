<?php 
session_start();

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

    if ($row['email_address'] == $uname && $row['password'] == $password && $row['type']=='user') {
        echo "Logged in!<br>";
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['id'] = $row['ID'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['family_name'];
        header("location:welcomeuser.php") ;
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title> Login</title>
    <style>
.email input{
    width: 400px;
    padding: 20px;
    border-radius:10px;
    height: 20px;
    border:1px solid grey;
    margin: auto;
}
 
.pass input{
    width: 400px;
    padding: 20px;
    border-radius:10px;
    height: 20px;
    margin: 20px;
    border:1px solid grey;

}
.btn{
    background-color:blue;
    width: 500px;
    padding: 20px;
    height: 20px;
    border:1px solid grey;
    border-radius:10px;
    color:white;
}
 


    </style>
</head>
<body>
    <center><h1>login </h1></center>
<center>    <h5>welcome back</h5></center>
    <div class="container">

        <center><form method="POST">
            <div class="email">

                <input type="email" name="email" placeholder="Enter the User email" required/>
            </div>
            <div class="pass">

                <input type="password" name="password" placeholder="password" required>
            </div>
            <p class="text-center mt-2 fs-2 text-muted">Don't have an account?<a href="register.php">sign up</a></p>
            <input type="submit" name="submit" type="submit" value="LOGIN" class="btn"/>
        </form></center>
    </div>
</body>
</html>