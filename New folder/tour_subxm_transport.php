<?php
include "config.php";
$sql = "SELECT *FROM connectivity";
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT *FROM connectivitya";
$result2 = mysqli_query($conn, $sql2);
?>




<!doctype html>
<html lang="en">

<head>
    <title>Sylhet</title>
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
    <?php include "./component/navbar.php" ?>
    <!-- carousel section  -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Jaflong</h2>
                    <p>Journeys, explorations, and adventures</p>
                </div>
                <img class="d-block w-100" src="images/sylhet (1).jpg" alt="Jaflong"
                    style="height: 600px; object-fit:cover;" alt="First slide">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Sreemongol</h2>
                    <p>Journeys, explorations, and adventures</p>
                </div>
                <img class="d-block w-100" src="images/sylhet (2).jpg" alt="Sreemongol"
                    style="height: 600px; object-fit:cover;" alt="Second slide">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Bichanakandi</h2>
                    <p>Journeys, explorations, and adventures</p>
                </div>
                <img class="d-block w-100" src="images/sylhet (3).jpg" style="height: 600px; object-fit:cover;"
                    alt="Third slide">
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- content section  -->
    <div class="container-fluid">
        <div class="row ">
            <div class="col-2 p-0">
                <nav class="nav flex-column bg-dark  text-white box h-100">
                    <div class="d-block h4" style="background:rgba(14, 13, 13, 0.868) !important">
                        <h3 class="p-2">Tour Spot</h3>
                    </div>
                    <ul class="list-unstyled text-white box h5">
                        <p class="pb-2 pl-2">SYLHET</p>
                    </ul>
                </nav>

            </div>
            <div class="col-10 ">
                <div class="content">
                    <div class="text-right p-2"><?php include "./component/backButton.php" ?></div>
                    <p class="container w-75 border border-warning p-2 text-center h3 ">Transportation Connectivity to
                        <strong>Sylhet</strong> from different district :
                    </p>
                    <br /><br>
                    <!-- bus table start -->
                    <div class="container w-50 text-center mt-4">

                        <div class="text-left border border-dark text-center bg-warning p-1">
                            <h2>By Bus <i class="fa fa-bus" aria-hidden="true"></i></h2>
                        </div>

                        <table class="table table-striped table-bordered ">
                            <thead class="thead-dark">
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
        ?>
                                <tr>
                                    <td scope="row"><?php echo $row['start']; ?></td>
                                    <td><?php echo $row['stop']; ?></td>
                                    <td><?php echo $row['cost']; ?></td>
                                    <td>
                                        <a href=<?php echo "./crud/tour_subxm/edit.php?id=$id"; ?>
                                            class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i></a>

                                        <a href=<?php echo "./crud/tour_subxm/delete.php?id=$id"; ?>
                                            class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"
                                                aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php
        }
        ?>

                            </tbody>
                        </table>
                    </div>

                    <!-- ADD Modal start -->

                    <div class="text-center">
                        <button type="button" class="btn btn-outline-primary p-2 btn-sm" data-toggle="modal"
                            data-target="#AddLocation">Add Connectivity</button>
                    </div>

                    <div class="modal fade " id="AddLocation" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                        aria-hidden="true">
                        <div class="modal-dialog border border-warning border-2 rounded" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title ">Add Connectivity</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="./crud/tour_subxm/insert.php" method=" POST" id="saveLocation">
                                        <div class="mb-3">
                                            <label for="from">From:</label>
                                            <input type="text" name="from" id="from" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="to">To:</label>
                                            <input type="text" name="to" id="to" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cost">Cost:</label>
                                            <input type="text" name="cost" id="cost" class="form-control">
                                        </div>
                                        <div class="pt-2"> <input type="submit" class="btn btn-success" value="Insert"
                                                name="submit" class="form-control"></div>
                                    </form>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add modal end  -->
                    <!-- bus table end -->

                    <br><br>

                    <!-- air table start -->
                    <div class="container w-50 text-center mt-4">

                        <div class="text-left border border-dark text-center bg-warning p-1">
                            <h2>By Air <i class="fa fa-plane"></i></h2>
                        </div>

                        <table class="table table-striped table-bordered ">
                            <thead class="thead-dark">
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Airlines</th>
                                    <th>Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        while ($row = mysqli_fetch_assoc($result2)) {
            $id = $row["id"];
        ?>
                                <tr>
                                    <td scope="row"><?php echo $row['start']; ?></td>
                                    <td><?php echo $row['stop']; ?></td>
                                    <td><?php echo $row['brand']; ?></td>
                                    <td><?php echo $row['cost']; ?></td>
                                    <td>
                                        <a href=<?php echo "./crud/tour_subxm/edit_a.php?id=$id"; ?>
                                            class="btn btn-primary btn-sm"> <i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i></a>

                                        <a href=<?php echo "./crud/tour_subxm/delete_a.php?id=$id"; ?>
                                            class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"
                                                aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php
        }
        ?>

                            </tbody>
                        </table>
                    </div>

                    <!-- ADD Modal start -->

                    <div class="text-center">
                        <button type="button" class="btn btn-outline-primary p-2 btn-sm" data-toggle="modal"
                            data-target="#AddConnectivityAir">Add Connectivity</button>
                    </div>

                    <div class="modal fade " id="AddConnectivityAir" tabindex="-1" role="dialog"
                        aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog border border-warning border-2 rounded" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title ">Add Connectivity</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="./crud/tour_subxm/insert_a.php" method=" POST" id="saveLocation">
                                        <div class="mb-3">
                                            <label for="from">From:</label>
                                            <input type="text" name="from" id="from" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="to">To:</label>
                                            <input type="text" name="to" id="to" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="brand">Brand:</label>
                                            <input type="text" name="brand" id="brand" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cost">Cost:</label>
                                            <input type="text" name="cost" id="cost" class="form-control">
                                        </div>
                                        <div class="pt-2"> <input type="submit" class="btn btn-success" value="Insert"
                                                name="submit" class="form-control"></div>
                                    </form>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add modal end  -->

                    <!-- air table end -->

                    <br><br><br>
                    <!-- train link start  -->

                    <div class="container w-50 text-center mt-4">
                        <div class="border border-dark text-center bg-warning">
                            <h2 class="text-center p-2">By Train <i class="fa fa-train"></i></i></h2>
                        </div>
                        <div class=" border border-secodary">
                            <h4 class="bg-dark text-white p-2">To purchase a train ticket <i class="fa fa-ticket"
                                    aria-hidden="true"></i> click button below:</h4>

                            <a class="btn btn-dark mb-2" href="https://eticket.railway.gov.bd" target="_blank">Click
                                Here</a>

                        </div>

                    </div>


                    <!-- train link end  -->



                </div>
            </div>
        </div>
    </div>


    <!-- footer section  -->
    <?php include "./component/footerf.php" ?>




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