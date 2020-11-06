<?php
    if (!isset($_POST["btn_submit"])) {
        header("location: http://localhost:8080/ASM2_TieuMy_Store/web/register.php");
    }

    include("config.php");
    
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    // handle user information

    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $rePassword = $_POST['rePassword'];
    // Check password and rePassword
    if($password != $rePassword) {
        echo "Error: Password doesn't match with confirm password";
    }

    $sql = "insert into user(Username,Email,Password) values('$username','$email','$password')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("location: http://localhost:8080/ASM2_TieuMy_Store/web/login.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
        
    mysqli_close($conn);
?>