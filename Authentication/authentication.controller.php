<?php session_start();
// Create connection
$con = new mysqli("localhost", "root", "", "budget_calculator");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n =  $_POST['name'];
    $a =  $_POST['age'];
    $e =  $_POST['email'];
    $p =  $_POST['phone'];
    $pw = $_POST['password'];
    $pwc = $_POST['confirm_password'];
    if($pw == $pwc)
    {
        $pw = md5($pw);
    }

    $check = mysqli_query($con, "SELECT * FROM register WHERE email = '$e' ");
    $count = mysqli_num_rows($check);
    if ($count > 0) {
        $_SESSION['massage'] = "User is Already Registered !";
        $_SESSION['msg_type'] = "warning";

        header("location: register.php");
    } else {
        $q = mysqli_query($con, "INSERT INTO register (name, age, phone, email, password) VALUE ('$n', '$a', '$p', '$e', '$pw')");
        $_SESSION['massage'] = "User Registration Successful !";
        $_SESSION['msg_type'] = "success";

        header("location: register.php");
    }
}





?>