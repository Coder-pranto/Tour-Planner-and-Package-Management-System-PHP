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
                        <form method="POST">

                            <div class="text-center p-2">
                                <h2>Update Subcategory</h2>
                            </div>
                            <div class="form-inline form-group">
                                <select class="form-control" name="s1" required>
                                    <option selected>Select subcategory</option>

                                    <?php
                                    $s = "select * from subcategory";
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
                         
                                $s = "select * from subcategory where subcatid='" . $_POST["s1"] . "'";
                                $result = mysqli_query($cn, $s);
                                $r = mysqli_num_rows($result);

                                $data = mysqli_fetch_array($result);
                                $Subcatid = $data[0];
                                $Subcatname = $data[1];
                                $Catid = $data[2];
                                $Pic = $data[3];
                                $Detail = $data[4];
                            }

                            ?>
                            <div class="form-group">
                                <input type="text" class="form-control" name="t1" placeholder="Category Name"
                                    value="<?php if(isset($_POST["show"])){ echo $Subcatname ;} ?>" required="required">
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="t2"
                                    value="<?php if(isset($_POST["show"])){ echo $Catid ;} ?> " required>
                                    <option selected>Select category</option>

                                    <?php
							$s = "select * from category";
							$result = mysqli_query($cn, $s);
							$r = mysqli_num_rows($result);
							//echo $r;

							while ($data = mysqli_fetch_array($result)) {
								if (isset($_POST["show"]) && $data[0] == $Catid) {
									echo "<option value=$data[0] selected>$data[1]</option>";
								} else {
									echo "<option value=$data[0]>$data[1]</option>";
								}
							}
						
							?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Old picture</label>
                                <img src="subcatimages/<?php echo @$Pic; ?>" width="150px" height="100px" />
                                <input type="hidden" name="h1" class="form-control" value="<?php if (isset($_POST["show"])) {
																		echo $Pic;
																	} ?>" />
                            </div>
                            <div class="form-group">
                                <label>Upload new picture</label>
                                <input type="file" name="t3" class="form-control" placeholder="Upload new picture" />
                            </div>
                            <div class="form-group">
                                <textarea name="t4" class="form-control"
                                    placeholder="Details" /><?php if (isset($_POST["show"])) {echo $Detail;}?></textarea>

                            </div>
                            <div class=" form-group">
                                <button type="submit" value="add" name="sbmt" class="btn btn-success btn-lg btn-block">
                                    Update
                                </button>
                            </div>

                    </div>


                </div>
            </div>

            <hr>


        </div>
    </div>

    <?php
	if (isset($_POST["sbmt"])) {

		$target_dir = "subcatimages/";
		$target_file = $target_dir . basename($_FILES["t3"]["name"]);
		$uploadok = 1;
		$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
		//check if image file is a actual image or fake image

		if (move_uploaded_file($_FILES["t3"]["tmp_name"], $target_file)) {
		} else {
			echo "sorry there was an error uploading your file.";
		}
	}
	?>

    <?php
	if (isset($_POST["sbmt"])) {

		if (empty($_FILES['t3']['name'])) {

			$s = "update subcategory set Subcatname='" . $_POST["t1"] . "',Catid='" . $_POST["t2"] . "',Pic='" . $_POST["h1"] . "',Detail='" . $_POST["t4"] . "' where Subcatid='" . $_POST["s1"] . "'";
		} else {

			$s = "update subcategory set Subcatname='" . $_POST["t1"] . "',Catid='" . $_POST["t2"] . "',Pic='" .  basename($_FILES["t3"]["name"]) . "',Detail='" . $_POST["t4"] . "' where Subcatid='" . $_POST["s1"] . "'";
		}
		mysqli_query($cn, $s);
		echo "<script>alert('Record Update');</script>";
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