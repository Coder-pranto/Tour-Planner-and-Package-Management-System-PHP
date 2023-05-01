<?php
 $conn = mysqli_connect('localhost', 'root', '', 'package') or die("connection failed.");

 ?>
<!doctype html>
<html lang="en">

<head>
    <title>Packages</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awesome cdn  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-4 h4 mb-0">
        <a class="navbar-brand text-uppercase ml-5" href="index.php"><span class="h3"><span
                    class="text-warning">G</span>hurte
                jabo</a></span>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav m-auto mt-2 mt-lg-0 text-warning ">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Destination</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userActivity/tourPlan.php">Tour plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php">Package</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact</a>
                </li>
            </ul>
            <div class="text-right text-white mr-5">
                <i class="fa fa-lg fa-search mr-4" aria-hidden="true"></i>
                <a href="Entrypage.php"><i class="fa fa-lg fa-user  mr-4" aria-hidden="true"></i></a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="tbl1 col-2">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col" class="h3 text-left">Category</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
 
                         $s = "select * from category";
                         $result = mysqli_query($conn, $s);
                         $r = mysqli_num_rows($result);
 
 
                         while ($data = mysqli_fetch_array($result)) {
 
                             echo "<tr><td style=' padding:6px;'><b><a href='subcat.php?catid=$data[0]'>$data[1]</a></b></td></tr>";
                         }
                        
                         ?>

                    </tbody>
                </table>
            </div>
            <div class="tbl2 col-10 mt-3">
                <div>
                    <table cellpadding="0px" cellspacing="0" width="1000px">
                        <tr>
                            <td class="font-weight-bold h3 pb-2 text-center">View Package</td>
                        </tr>
                        <tr>
                            <td class="paraText" width="900px">
                                <table cellpadding="0" cellspacing="0" width="900px" border="0">
                                    <tr>
                                        <td>
                                            <table border="0" width="600px" height="400px" align="center">
                                                <?php

                                $s="select * from package,category,subcategory where package.category=category.cat_id and package.subcategory=subcategory.subcatid and package.packid='" . $_GET["pid"] ."'";
                                $result=mysqli_query($conn,$s);
                                $r=mysqli_num_rows($result);
                                $n=0;
                                $data=mysqli_fetch_array($result);
                                mysqli_close($conn);
                                ?>


                                                <tr>
                                                    <td colspan="3" class="p-2 border border-warning">
                                                        <span class="font-weight-bold">Pack
                                                            Name:</span>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data[1];?>
                                                    </td>
                                                </tr>

                                                <tr class="pb-5">
                                                    <td><img src=" images/new/<?php echo $data[5];?>" width="200px"
                                                            height="200px" />
                                                    </td>

                                                    <td style="padding-left:15px"><img
                                                            src="images/new/<?php echo $data[6];?>" width="200px"
                                                            height="200px" /></td>

                                                    <td style="padding-left:15px"><img
                                                            src="images/new/<?php echo $data[7];?>" width="200px"
                                                            height="200px" /></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" height="90px">
                                                        <span
                                                            class="font-weight-bold">Category:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <?php echo $data[10];?>
                                                        <br />
                                                        <span class="font-weight-bold">Subcategory:</span>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <?php echo $data[12];?>
                                                        <br />
                                                        <span
                                                            class="font-weight-bold">Price:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <?php echo $data[4];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <p><?php echo $data[8];?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="3" height="50px"><a
                                                            href="enquiry.php?pid=<?php echo $data[0];?>">
                                                            <input class="btn btn-sm btn-primary" type="button"
                                                                value="Enquiry" name="sbmt" />
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                </div>
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