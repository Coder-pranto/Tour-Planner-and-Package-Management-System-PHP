<?php session_start();
// Create connection
$con = new mysqli("localhost","root","","budget_calculator");

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}


//Add user
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $b =  $_POST['budget'];
    $d =  $_POST['destination'];
    $e =  $_POST['departure'];
    $f =  $_POST['adult'];

    $q = mysqli_query($con, "INSERT INTO user_budget (destination,departure,adult, budget) VALUE ('$d', '$e',$f,'$b')");
    $_SESSION['massage'] = "Record has been saved !";
    $_SESSION['msg_type'] = "primary";
    
    header("location: tourPlan.php");

}


//Add hotels
if (isset($_GET['select'])) {
    $id = $_GET['select'];

    $result = mysqli_query($con, "SELECT h_name, cost FROM hotels WHERE id=$id");


    if (mysqli_num_rows($result) == 1) {
        $row = $result->fetch_assoc();
        $name = $row['h_name'];
        $amount = $row['cost'];

        $check= mysqli_query($con, "SELECT * FROM expenselist WHERE name = '$name' ");
        $count = mysqli_num_rows($check);

        if ($count > 0) {
            $_SESSION['massage'] = "Item is already exists in list !";
            $_SESSION['msg_type'] = "warning";

            header("location: tourPlan.php");
        } else {

            $query = mysqli_query($con, "INSERT INTO expenselist (name, amount) VALUE ('$name', '$amount')");
            $_SESSION['massage'] = "User record has been saved !";
            $_SESSION['msg_type'] = "primary";

            header("location: tourPlan.php");
        }
    }
}

//Add transports
if(isset($_GET['select1'])){
    $id = $_GET['select1'];
    $result = mysqli_query($con, "SELECT t_name, cost FROM transport WHERE id=$id");

    if( mysqli_num_rows($result) == 1){
        $row = $result->fetch_assoc();
        $name = $row['t_name'];
        $amount = $row['cost'];
        $check= mysqli_query($con, "SELECT * FROM expenselist WHERE name = '$name' ");
        $count = mysqli_num_rows($check);

        if ($count > 0) {
            $_SESSION['massage'] = "Item is already exists in list !";
            $_SESSION['msg_type'] = "warning";

            header("location: tourPlan.php");
        }
        
        elseif(mysqli_num_rows(mysqli_query($con, "SELECT single_transport FROM expenselist WHERE single_transport = '1' ")) > 0) 
        {
            $_SESSION['massage'] = "Only one transportaion can be added!";
            $_SESSION['msg_type'] = "warning";

            header("location: tourPlan.php");
        }
           
        else {

            $query = mysqli_query($con, "INSERT INTO expenselist (name, amount, single_transport) VALUE ('$name', '$amount','1')");
            $_SESSION['massage'] = "User record has been saved !";
            $_SESSION['msg_type'] = "primary";

            header("location: tourPlan.php");
        }
    }

}
//Add restaurent
if(isset($_GET['select2'])){
    $id = $_GET['select2'];
    $result = mysqli_query($con, "SELECT r_name, cost FROM restaurent WHERE id=$id");

    if( mysqli_num_rows($result) == 1){
        $row = $result->fetch_assoc();
        $name = $row['r_name'];
        $amount = $row['cost'];
        
        $check= mysqli_query($con, "SELECT * FROM expenselist WHERE name = '$name' ");
        $count = mysqli_num_rows($check);

        if ($count > 0) {
            $_SESSION['massage'] = "Item is already exists in list !";
            $_SESSION['msg_type'] = "warning";

            header("location: tourPlan.php");
        } else {

            $query = mysqli_query($con, "INSERT INTO expenselist (name, amount) VALUE ('$name', '$amount')");
            $_SESSION['massage'] = "User record has been saved !";
            $_SESSION['msg_type'] = "primary";

            header("location: tourPlan.php");
        }
    }

}

//Add Entertainment Spots
if(isset($_GET['select3'])){
    $id = $_GET['select3'];

    $result = mysqli_query($con, "SELECT e_name, cost FROM entertainment WHERE id=$id");
    if( mysqli_num_rows($result) == 1){
        $row = $result->fetch_assoc();
        $name = $row['e_name'];
        $amount = $row['cost'];
        $check= mysqli_query($con, "SELECT * FROM expenselist WHERE name = '$name' ");
        $count = mysqli_num_rows($check);

        if ($count > 0) {
            $_SESSION['massage'] = "Item is already exists in list !";
            $_SESSION['msg_type'] = "warning";

            header("location: tourPlan.php");
        } else {

            $query = mysqli_query($con, "INSERT INTO expenselist (name, amount) VALUE ('$name', '$amount')");
            $_SESSION['massage'] = "User record has been saved !";
            $_SESSION['msg_type'] = "primary";

            header("location: tourPlan.php");
        }
    }

}


//delete data

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $query = mysqli_query($con, "DELETE FROM expenselist WHERE id=$id");
    $_SESSION['massage'] = "Record has been Deleted !";
    $_SESSION['msg_type'] = "danger";


    header("location: tourPlan.php");

}

//reset database

if(isset($_GET['reset'])){

    $query_user_expense_list = mysqli_query($con, "DELETE FROM expenselist");
    $query_user_budget_data = mysqli_query($con, "DELETE FROM user_budget");
    $_SESSION['massage'] = "User Data is deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: tourPlan.php");

}


if(isset($_GET['low_balance'])){

    $_SESSION['massage'] = "Low Balance! Can't Add Item.";
    $_SESSION['msg_type'] = "danger";

    header("location: tourPlan.php");

}




?>