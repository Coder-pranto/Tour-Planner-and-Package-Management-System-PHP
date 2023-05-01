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

                    <?php
                    include 'htmlDomParser.php';
                    $html = file_get_html('https://itsholidaysltd.com/domestic-air-ticket-price-in-bangladesh/');
                    $one = $html->find('span', 6)->innertext;
                    $two = $html->find('span', 13)->innertext;
                    $three = $html->find('span', 21)->innertext;
                    $four = $html->find('span', 28)->innertext;
                    $five = $html->find('span', 35)->innertext;

                    ?>


                    <!-- air table start -->
                    <div class="container w-50 text-center mt-4">

                        <div class="text-left border border-dark text-center bg-warning p-1">
                            <h2>By Air <i class="fa fa-plane"></i></h2>
                        </div>

                        <table class="table table-striped table-bordered ">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Airlines</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Ticket Fare</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Biman Bangladesh Airlines
                                    </td>
                                    <td>
                                        Dhaka
                                    </td>
                                    <td>
                                        Sylhet
                                    </td>
                                    <td>
                                        <?= $one; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        US-Bangla Airlines
                                    </td>
                                    <td>
                                        Dhaka
                                    </td>
                                    <td>
                                        Sylhet
                                    </td>
                                    <td>
                                        <?= $two; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Regent Airways
                                    </td>
                                    <td>
                                        Dhaka
                                    </td>
                                    <td>
                                        Sylhet
                                    </td>
                                    <td>
                                        <?= $three; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        NovoAir
                                    </td>
                                    <td>
                                        Dhaka
                                    </td>
                                    <td>
                                        Sylhet
                                    </td>
                                    <td>
                                        <?= $four; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        United Airways
                                    </td>
                                    <td>
                                        Dhaka
                                    </td>
                                    <td>
                                        Sylhet
                                    </td>
                                    <td>
                                        <?= $five; ?>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>


                    <!-- air table end -->

                    <br><br><br>

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