<?php
    if (!isset($_POST["btn_submit"])) {
        header("Location:http://localhost/ASM2_TieuMy_Store/web/register.php");
    }
    
    include("config.php");

    // Check connection
    if (!$conn)  die("Connection failed: " . mysqli_connect_error());
       
    // handle user information
    $username = $_POST['Username'];
    echo $username;
    $password = $_POST['Password'];

    // Check password and rePassword
    $sql = "SELECT * FROM user WHERE Username = '$username' and Password = '$password'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        // session_register("myusername");
        // $_SESSION['login_user'] = $myusername;
        
        header("location: http://localhost:8080/ASM2_TieuMy_Store/web/index.php");
    }else {
        echo "Your Login Name or Password is invalid";
        header("location: http://localhost:8080/ASM2_TieuMy_Store/web/login.php");
    }
        
    mysqli_close($conn);
?>