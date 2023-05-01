<?php session_start();
// Create connection
$con = new mysqli("localhost", "root", "", "budget_calculator");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $e =  $_POST['email'];
   $new_pw = md5($_POST['password']);
   // $new_pw = $_POST['password'];

    $check = mysqli_query($con, "SELECT * FROM register WHERE email = '$e'");
    $count = mysqli_num_rows($check);
    
    if ($count > 0) {

        $sql = "UPDATE register SET password = '$new_pw' WHERE email = '$e'" ;
        if(mysqli_query($con, $sql)){
            $_SESSION['massage'] = "Password Changed";
            $_SESSION['msg_type'] = "success";
            header("location: Login.php");
        }
        
    } else {
       
        $_SESSION['massage'] = "User is not registered";
        $_SESSION['msg_type'] = "danger";
        $_SESSION['login'] = 'false';

        header("location: register.php");
    }
}



?>

<!doctype html>
<html lang="en">

<head>
    <title>ForgetPassword</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- fontawsome 4  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- heading section  -->
    <?php include "navbarAuth.php" ?>


    <div class="container mt-5 mb-3">
        <div class="signup-form w-50 border m-auto p-3 ">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <div class="text-center">
                    <h2> Password Change </h2>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email"
                        pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required="required">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="New Password"
                        required="required">
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block"> Change Password</button>
                </div>

            </form>

        </div>


    </div>
    <br><br><br><br><br><br>

    <!-- footer section  -->
    <?php include "../component/footerf.php" ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>