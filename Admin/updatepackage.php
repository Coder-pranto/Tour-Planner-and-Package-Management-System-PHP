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
                                <h2>Update Package</h2>
                            </div>
                            <div class="form-inline form-group">
                                <select class="form-control" name="s1" required>
                                    <option selected>Select pacakage</option>

                                    <?php

                                    $s = "select * from package";
                                    $result = mysqli_query($cn, $s);
                                    $r = mysqli_num_rows($result);

                                    while ($data = mysqli_fetch_array($result)) {
                                        if (isset($_POST["show"]) && $data[0] == $_POST["s1"]) {
                                            echo "<option value=$data[0] selected>$data[1]</option>";
                                        } else {
                                            echo "<option value=$data[0]>$data[1]</option>";
                                        }
                                    }

                                    ?>

                                </select>
                                <input type="submit" class="form-control ml-2 btn-secondary" value="Show" name="show"
                                    formnovalidate />
                            </div>
                            <?php
                            if (isset($_POST["show"])) {
                                $s = "select * from package where Packid='" . $_POST["s1"] . "'";
                                $result = mysqli_query($cn, $s);
                                $r = mysqli_num_rows($result);

                                $data = mysqli_fetch_array($result);
                                $Packid = $data[0];
                                $Packname = $data[1];
                                $Category = $data[2];
                                $Subcategory = $data[3];
                                $Packprice = $data[4];
                                $Pic1 = $data[5];
                                $Pic2 = $data[6];
                                $Pic3 = $data[7];
                                $Detail = $data[8];
                            }

                            ?>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Package Name"
                                    value="<?php if (isset($_POST["show"])) { echo $Packname;} ?> " name="t1"
                                    required="required">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="t2" required>
                                    <option selected>Select category</option>

                                    <?php

                                    $s = "select * from category";
                                    $result = mysqli_query($cn, $s);
                                    $r = mysqli_num_rows($result);
                                    //echo $r;

                                    while ($data = mysqli_fetch_array($result)) {
                                        if (isset($_POST["show"]) && $Category == $data[0]) {

                                            echo "<option value=$data[0] selected='selected' >$data[1]</option>";
                                        } else {
                                            echo "<option value=$data[0]>$data[1]</option>";
                                        }
                                    }

                                    ?>

                                </select>
                            </div>
                            <div class=" form-group">
                                <select class="form-control" name="t3" required>
                                    <option selected>Select subcategory</option>

                                    <?php

                                    $s = "select * from subcategory";
                                    $result = mysqli_query($cn, $s);
                                    $r = mysqli_num_rows($result);

                                    while ($data = mysqli_fetch_array($result)) {
                                        if (isset($_POST["show"]) && $Subcategory == $data[0]) {

                                            echo "<option value=$data[0] selected='selected' >$data[1]</option>";
                                        } else {
                                            echo "<option value=$data[0]>$data[1]</option>";
                                        }
                                    }

                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="t8" placeholder="Package price" name="t8"
                                    value="<?php if(isset($_POST["show"])){ echo $Packprice ;} ?> " required="required">
                            </div>
                            <div class="text-white text-left">
                                <label>Upload Photos</label>
                            </div>
                            <div class="form-group">
                                Old photo 1<img src="packimages/<?php echo @$Pic1; ?>" width="150px" height="100px" />
                                <input type="hidden" name="h1" value="<?php if(isset($_POST["show"])) {echo $Pic1;} ?>"
                                    class="form-control" />
                            </div>

                            <div class="form-group">
                                Upload photo 1<input type="file" name="t4" class="form-control" />
                            </div>

                            <div class="form-group">
                                Old photo 2<img src="packimages/<?php echo @$Pic2; ?>" width="150px" height="100px" />
                                <input type="hidden" name="h2" value="<?php if(isset($_POST["show"])) {echo $Pic2;} ?>"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                Upload photo 2<input type="file" name="t5" class="form-control" />
                            </div>

                            <div class="form-group">
                                Old photo 3 <img src="packimages/<?php echo @$Pic3; ?>" width="150px" height="100px" />
                                <input type="hidden" name="h3" value="<?php if(isset($_POST["show"])) {echo $Pic3;} ?>"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                Upload photo 3<input type="file" name="t6" class="form-control" />
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="t7" placeholder="Details"
                                    required="required"><?php if(isset($_POST["show"])){ echo $Detail ;} ?></textarea>
                            </div>


                            <div class=" form-group">
                                <button type="submit" value="add" name="sbmt" class="btn btn-success btn-lg btn-block">
                                    Update
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


    <!-- new rewritten -->

    <?php

    if (isset($_POST["sbmt"])) {
        $target_dir = "packimages/";
        $f1 = 0;
        $f2 = 0;
        $f3 = 0;
        
        if (empty($_FILES['t4']['name']) && empty($_FILES['t5']['name']) && empty($_FILES['t6']['name'])) {
            // update all fields except the images
            $s = "UPDATE package SET Packname='" . $_POST["t1"] . "', Category='" . $_POST["t2"] . "', Subcategory='" . $_POST["t3"] . "', Packprice='" . $_POST["t8"] . "', Detail='" . $_POST["t7"] . "' WHERE Packid='" . $_POST["s1"] . "'";
        } else {
            // update all fields, including the images
            $s = "UPDATE package SET Packname='" . $_POST["t1"] . "', Category='" . $_POST["t2"] . "', Subcategory='" . $_POST["t3"] . "', Packprice='" . $_POST["t8"] . "', Pic1='" . basename($_FILES["t4"]["name"]) . "', Pic2='" . basename($_FILES["t5"]["name"]) . "', Pic3='" . basename($_FILES["t6"]["name"]) . "', Detail='" . $_POST["t7"] . "' WHERE Packid='" . $_POST["s1"] . "'";
    
            // t4
            $target_file = $target_dir . basename($_FILES["t4"]["name"]);
            if (move_uploaded_file($_FILES["t4"]["tmp_name"], $target_file)) {
                $f1 = 1;
            } 
            
            // t5
            $target_file = $target_dir . basename($_FILES["t5"]["name"]);
            if (move_uploaded_file($_FILES["t5"]["tmp_name"], $target_file)) {
                $f2 = 1;
            } 
    
            // t6
            $target_file = $target_dir . basename($_FILES["t6"]["name"]);
            if ($_FILES["t6"]["size"] > 500000) {
                echo "sorry, your file is too large.";
                $uploadok = 0;
            } else {
                if (move_uploaded_file($_FILES["t6"]["tmp_name"], $target_file)) {
                    $f3 = 1;
                } 
            }
        }
        
        $result = mysqli_query($cn, $s);
        echo "<script>alert('Record Update');</script>";
    }

    ?>



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