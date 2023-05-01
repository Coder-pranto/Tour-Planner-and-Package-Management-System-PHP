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
    ?>


    <?php include "navbarAdmin.php" ?>

    <div class=" container">
        <div class="row">
            <div class="col-4 linkSection">
                <?php include "sidebarAdmin.php" ?>
            </div>

            <div class="col-8 border-left border-primary text-center">

                <div class="mt-5 mb-3 ">
                    <div class="signup-form w-75 border m-auto p-3 bg-secondary">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="text-center p-2">
                                <h2>Add Package</h2>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="t1" placeholder="Package name"
                                    required="required">
                            </div>
                            <div class=" form-inline form-group">
                                <select class="form-control" name="t2" required>
                                    <option selected>Select category</option>

                                    <?php

                                    $s = "select * from category";
                                    $result = mysqli_query($cn, $s);
                                    $r = mysqli_num_rows($result);

                                    while ($data = mysqli_fetch_array($result)) {
                                        if (isset($_POST["show"]) && $data[0] == $_POST["t2"]) {
                                            echo "<option value=$data[0] selected='selected'>$data[1]</option>";
                                        } else {
                                            echo "<option value=$data[0]>$data[1]</option>";
                                        }
                                    }

                                    ?>
                                </select>
                                <input type="submit" class="form-control ml-2 btn-secondary" value="Show" name="show"
                                    formnovalidate />
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="t3" required>
                                    <option selected>Select subcategory</option>

                                    <?php

                                    $s = "select * from subcategory";
                                    $result = mysqli_query($cn, $s);
                                    $r = mysqli_num_rows($result);

                                    while ($data = mysqli_fetch_array($result)) {
                                        if (isset($_POST["show"])) {
                                            if ($data[2] == $_POST["t2"]) {
                                                echo "<option value=$data[0] >$data[1]</option>";
                                            }
                                        }
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="t8" placeholder="Package price"
                                    required="required">
                            </div>
                            <div class="text-white text-left">
                                <label>Upload Photos</label>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="t4" placeholder="Upload image 1"
                                    required="required">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="t5" placeholder="Upload image 2"
                                    required="required">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="t6" placeholder="Upload image 3"
                                    required="required">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="t7" placeholder="Details"
                                    required="required"></textarea>
                            </div>

                            <div class=" form-group">
                                <button type="submit" value="add" name="sbmt" class="btn btn-success btn-lg btn-block">
                                    Save
                                </button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>

            <hr>

        </div>
    </div>

    <?php
    if (isset($_POST["sbmt"])) {
        $f1 = 0;
        $f2 = 0;
        $f3 = 0;

        $target_dir = "packimages/";
        //t4
        $target_file = $target_dir . basename($_FILES["t4"]["name"]);
        $uploadok = 1;
        $imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
        //check if image file is a actual image or fake image
        $check = getimagesize($_FILES["t4"]["tmp_name"]);
        if ($check !== false) {
            echo "file is an image - " . $check["mime"] . ".";
            $uploadok = 1;
        } else {
            echo "file is not an image.";
            $uploadok = 0;
        }


        //check if file already exists
        if (file_exists($target_file)) {
            echo "sorry,file already exists.";
            $uploadok = 0;
        }

        //check file size
        if ($_FILES["t4"]["size"] > 500000) {
            echo "sorry, your file is too large.";
            $uploadok = 0;
        }


        //aloow certain file formats
        if ($imagefiletype != "jpg" && $imagefiletype != "png" && $imagefiletype != "jpeg" && $imagefileype != "gif") {
            echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
            $uploadok = 0;
        } else {
            if (move_uploaded_file($_FILES["t4"]["tmp_name"], $target_file)) {
                $f1 = 1;
            } else {
                echo "sorry there was an error uploading your file.";
            }
        }


        //t5
        $target_file = $target_dir . basename($_FILES["t5"]["name"]);
        $uploadok = 1;
        $imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
        //check if image file is a actual image or fake image
        $check = getimagesize($_FILES["t5"]["tmp_name"]);
        if ($check !== false) {
            echo "file is an image - " . $check["mime"] . ".";
            $uploadok = 1;
        } else {
            echo "file is not an image.";
            $uploadok = 0;
        }


        //check if file already exists
        if (file_exists($target_file)) {
            echo "sorry,file already exists.";
            $uploadok = 0;
        }

        //check file size
        if ($_FILES["t5"]["size"] > 500000) {
            echo "sorry, your file is too large.";
            $uploadok = 0;
        }


        //aloow certain file formats
        if ($imagefiletype != "jpg" && $imagefiletype != "png" && $imagefiletype != "jpeg" && $imagefileype != "gif") {
            echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
            $uploadok = 0;
        } else {
            if (move_uploaded_file($_FILES["t5"]["tmp_name"], $target_file)) {
                $f2 = 1;
            } else {
                echo "sorry there was an error uploading your file.";
            }
        }
        //t6
        $target_file = $target_dir . basename($_FILES["t6"]["name"]);
        $uploadok = 1;
        $imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
        //check if image file is a actual image or fake image
        $check = getimagesize($_FILES["t6"]["tmp_name"]);
        if ($check !== false) {
            echo "file is an image - " . $check["mime"] . ".";
            $uploadok = 1;
        } else {
            echo "file is not an image.";
            $uploadok = 0;
        }


        //check if file already exists
        if (file_exists($target_file)) {
            echo "sorry,file already exists.";
            $uploadok = 0;
        }

        //check file size
        if ($_FILES["t6"]["size"] > 500000) {
            echo "sorry, your file is too large.";
            $uploadok = 0;
        }


        //aloow certain file formats
        if ($imagefiletype != "jpg" && $imagefiletype != "png" && $imagefiletype != "jpeg" && $imagefileype != "gif") {
            echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
            $uploadok = 0;
        } else {
            if (move_uploaded_file($_FILES["t6"]["tmp_name"], $target_file)) {
                $f3 = 1;
            } else {
                echo "sorry there was an error uploading your file.";
            }
        }

        if ($f1 > 0 && $f2 > 0 && $f3 > 0) {

            $s = "insert into package(packname,category,subcategory,packprice,pic1,pic2,pic3,detail) values('" . $_POST["t1"] . "','" . $_POST["t2"] . "','" . $_POST["t3"] . "','" . $_POST["t8"] . "','" . basename($_FILES["t4"]["name"]) . "','" . basename($_FILES["t5"]["name"]) . "','" . basename($_FILES["t6"]["name"]) . "','" . $_POST["t7"] . "')";
            mysqli_query($cn, $s);
            mysqli_close($cn);
            echo "<script>alert('Record Save');</script>";
        }
    }
    ?>



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