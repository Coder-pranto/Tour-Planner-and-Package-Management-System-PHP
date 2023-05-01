<?php if (!isset($_SESSION)) {
    session_start();
} ?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php
    if ($_SESSION['loginstatus'] == "") {
        header("location:loginform.php");
    }

    $conn = mysqli_connect('localhost', 'root', '', 'admin') or die("connection failed.");

    if (isset($_POST["sbmt"])) {

        if ($_POST["password"] == $_POST["confirmpassword"]) {

            $s = "update users set pwd='" . $_POST["password"] . "',Typeofuser='" . $_POST["t1"] . "' where Username='" . $_POST["username"] . "'";
            mysqli_query($conn, $s);
            echo "<script>alert('Record Updated');</script>";
        } else {

            echo "<script>alert('Confirm password not matched !');</script>";
        }
    }
    ?>


    <?php include "navbarAdmin.php" ?>

    <div class=" container">
        <div class="row">
            <div class="col-4 linkSection">
                <?php include "sidebarAdmin.php" ?>
            </div>

            <div class="col-8 border-left border-primary text-center">

                <div class="mt-5 mb-3 ">
                    <div class="signup-form w-50 border m-auto p-3 bg-secondary">
                        <form method="POST">

                            <div class="text-center p-3">
                                <h2>Update User</h2>
                            </div>
                            <div class="form-inline form-group">
                                <select class="form-control" name="username" required>
                                    <option selected>Select User</option>

                                    <?php

                                    $s = "select * from users";
                                    $result = mysqli_query($conn, $s);
                                    $r = mysqli_num_rows($result);


                                    while ($data = mysqli_fetch_array($result)) {
                                        if (isset($_POST["show"]) && $data[0] == $_POST["username"]) {
                                            echo "<option value=$data[0] selected>$data[0]</option>";
                                        } else {
                                            echo "<option value=$data[0]>$data[0]</option>";
                                        }
                                    }

                                    ?>
                                </select>
                                <input type="submit" class="form-control ml-2 btn-secondary" value="Show" name="show"
                                    formnovalidate />

                            </div>
                            <?php
                            if (isset($_POST["show"])) {
                                $conn = mysqli_connect('localhost', 'root', '', 'admin') or die("connection failed.");
                                $s = "select * from users where Username='" . $_POST["username"] . "'";
                                $result = mysqli_query($conn, $s);
                                $r = mysqli_num_rows($result);

                                $data = mysqli_fetch_array($result);
                                $Username = $data[0];
                                $Pass = $data[1];
                                $Usertype = $data[2];
                            }
                            ?>

                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    value="<?php if (isset($_POST["show"])) {
                                                                                                                                echo $Pass;
                                                                                                                            } ?>"
                                    required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirmpassword"
                                    placeholder="Confirm Password"
                                    value="<?php if (isset($_POST["show"])) {
                                                                                                                                                echo $Pass;
                                                                                                                                            } ?>"
                                    required="required">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="t1">
                                    <option selected>Type of User</option>
                                    <option value="admin" <?php if (isset($_POST["show"]) && $Usertype == "admin") {
                                                                echo "selected";
                                                            } ?>>
                                        Admin
                                    </option>
                                    <option value="general" <?php if (isset($_POST["show"]) && $Usertype == "general") {
                                                                echo "selected";
                                                            } ?>>
                                        General
                                    </option>
                                </select>
                            </div>

                            <div class=" form-group">
                                <button type="submit" value="LOGIN" name="sbmt"
                                    class="btn btn-success btn-lg btn-block"> Update
                                </button>
                            </div>

                        </form>

                    </div>


                </div>
            </div>

            <hr>


        </div>
    </div>
    </div>















    <footer class="bg-dark text-center text-white">
        <div class="container p-4 pb-0">
            <section class="">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 href="index.php" class="text-uppercase mb-4 font-weight-bold h2">
                        <span class="text-warning">G</span>hurte Jabo
                    </h6>
                    <p class="font-weight-light">
                        Fuel Your Soul With Travel
                    </p>
                </div>
            </section>
        </div>

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white text-decoration-none " href="#">Riaj Hasan Pranto </a>
        </div>
        <!-- Copyright -->
    </footer>




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