<?php

session_start();
$uname = $_SESSION["username"]; 
echo $uname;
if($_SESSION["username"]==""){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wt";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) 
        die("Connection failed: " . mysqli_connect_error());

    $uname = $_POST["uname"]; 
    $name = $_POST["name"]; 
    $pwd = $_POST["pwd"]; 
    $mail = $_POST["mail"];
    $sql = "SELECT * FROM users WHERE username='$uname'";
    if ($result=mysqli_query($conn,$sql)){
    if($row=mysqli_fetch_row($result)){
        echo "<script type='text/javascript'> 
        alert('User already exists!'); window.location.href='signin.html';
        </script> ";
    }
        else{
            $sql = "INSERT INTO users (username, flname, pwd, email)
            VALUES ('$uname', '$name', '$pwd', '$mail')";
            if (mysqli_query($conn, $sql)) {
                $_SESSION["username"] = $uname;   
                echo "<script type='text/javascript'>
                alert('User created!'); window.location.href='home.html';
                </script> ";
            } else
                echo "<script type='text/javascript'>  
                alert('Retry'); window.location.href='home.html';
                </script> ";
        }
    }
    mysqli_close($conn);
}

else
        echo "<script type='text/javascript'> 
                alert('you are already signed in'); window.location.href='home.html';
                </script> ";
?>
