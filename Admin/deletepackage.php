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

    $cn = mysqli_connect('localhost', 'root', '', 'admin') or die("connection failed.");
    if (isset($_POST["sbmt"])) {
        $s = "delete from package where packid='" . $_POST["t1"] . "'";
        mysqli_query($cn, $s);
        echo "<script>alert('Record Delete');</script>";
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
                                <h2>Delete Package</h2>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="t1" required>
                                    <option selected>Select package</option>

                                    <?php
                                   
                                    $s = "select * from package";
                                    $result = mysqli_query($cn, $s);
                                    $r = mysqli_num_rows($result);

                                    while ($data = mysqli_fetch_array($result)) {

                                        echo "<option value=$data[0]>$data[1]</option>";
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class=" form-group">
                                <button type="submit" name="sbmt" class="btn btn-success btn-lg btn-block"> Delete
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

    <?php include "footerAdmin.php" ?>

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