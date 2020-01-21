<?php

session_start();

if($_SESSION["username"]== ""){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wt";
    echo"hi";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn)
        die("Connection failed: " . mysqli_connect_error());
    $uname = $_POST["uname"]; 
    $pwd = $_POST["pwd"]; 
    $sql = "SELECT * FROM users WHERE username='$uname'";
    if ($result=mysqli_query($conn,$sql)){
        if($row=mysqli_fetch_row($result)){ 
            if($row[2] == $pwd){
                echo "<script type='text/javascript'> alert('signed in!') ;</script>"; 
                $_SESSION["username"] = $uname;
            }   
            else{
                echo "<script type='text/javascript'> alert('noooo in!') ; 
                $('#uname').val() = '' ; $('#pwd').val() = '';
                document.location='login.html';
                </script>";
            }
    }
    else
        header("Location: signup.html");  
    }
    mysqli_close($conn);
}
else{
    echo "<script type='text/javascript'> 
    alert('Signed In'); window.location.href='home.html';
    </script> ";}
?>
