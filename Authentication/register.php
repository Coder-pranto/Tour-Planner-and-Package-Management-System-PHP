<?php session_start();?>

<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
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

    <?php

            if (isset($_SESSION['massage'])) {
                echo    "<div class='alert alert-{$_SESSION['msg_type']} alert-dismissible fade show ' role='alert'><i class='fa fa-check-circle'></i>

                <strong> {$_SESSION['massage']} </storng>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                ";
                unset($_SESSION['massage']);
                unset($_SESSION['msg_type']);
            }

    ?>


    <div class="container mt-2 mb-2">
        <div class="signup-form w-50 border m-auto p-3 ">
            <form action="authentication.controller.php" method="POST">

                <div class="text-center">
                    <h2>Register</h2>
                    <p class=" hint-text">Create your account. It's free and only takes a minute.</p>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name" required="required">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="age" placeholder="Age" required="required">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email"
                        pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required="required">
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" name="phone" placeholder="Contact Number"
                        pattern="[0-9]{3}[0-9]{3}[0-9]{3}[0-9]{2}" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password"
                        required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"
                        required="required">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
                </div>
            </form>
            <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
        </div>

    </div>
    </div>


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