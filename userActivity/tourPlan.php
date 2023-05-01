<?php session_start();
// Create connection

$con = new mysqli("localhost", "root", "", "budget_calculator");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

//user authentication 
if(!isset($_SESSION['login'])){
    $_SESSION['massage'] = "Please Log In!";
    $_SESSION['msg_type'] = "warning";
    header("location: ../Authentication/login.php");
 
}

$sql = "SELECT * FROM user_budget";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_row($result);

if ($row == null) {
    
    $budget_amount = $destination = '';
} else {

    $destination = trim($row[1], " ");
    $budget_amount = trim($row[4]);
    $departure = trim($row[2]);
    $adult = trim($row[3]);
}

//condition apply

if($budget_amount < "15000" ){
    $hotel_result = mysqli_query($con, "SELECT * FROM hotels WHERE place = '$destination' AND 
    (cost < 3000) ");
    $transport_result = mysqli_query($con, "SELECT * FROM transport WHERE place = '$destination' AND 
    (cost < 3000) ");
    
     $entertainment_result = mysqli_query($con, "SELECT * FROM entertainment WHERE place = '$destination' AND 
     (cost > 1500) ");

   $restaurent_result = mysqli_query($con, "SELECT * FROM restaurent WHERE place = '$destination' AND 
    (cost > 1700) ");

}
else{
    $hotel_result = mysqli_query($con, "SELECT * FROM hotels WHERE place = '$destination' AND 
    (cost > 5000) ");

    $transport_result = mysqli_query($con, "SELECT * FROM transport WHERE place = '$destination' AND 
    (cost < 3500) ");

    $entertainment_result = mysqli_query($con, "SELECT * FROM entertainment WHERE place = '$destination' AND 
     (cost > 2000) ");

    $restaurent_result = mysqli_query($con, "SELECT * FROM restaurent WHERE place = '$destination' AND 
    (cost > 1900) ");

}



$total = 0;
$id = 0;
$residue = 0;



//calculate Total budget
$expense_result = mysqli_query($con, "SELECT * FROM expenselist");
while ($row = $expense_result->fetch_assoc()) {
    $total = $total + ($row['amount']*$adult);
    $residue = (int)$budget_amount - ($total);
    if($residue<=100)
   { 
        $sql = mysqli_query($con,"DELETE from expenselist order by id desc limit 1");
        header("location: controller.php?low_balance=1");
       
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Activity</title>

    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body style="background-color:#e6e6ea ">

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-4 h4 mb-0">
        <a class="navbar-brand text-uppercase ml-5" href="../index.php"><span class="h3"><span
                    class="text-warning">G</span>hurte
                jabo</a></span>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav m-auto mt-2 mt-lg-0 text-warning ">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Destination</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../userActivity/tourPlan.php">Tour plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../category.php">Package</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <div class="text-right text-white mr-5">
                <i class="fa fa-lg fa-search mr-4" aria-hidden="true"></i>
                <i class="fa fa-lg fa-user  mr-4" aria-hidden="true"></i>
            </div>

        </div>
    </nav>

    <nav class="navbar navbar-dark bg-primary text-center">
        <span class="navbar-brand mb-0 h1 pull-right">User Activity <a class='btn btn-sm btn-danger'
                href="../Authentication/logout.php"><i class="fa fa-sign-out"></i></a></span>

    </nav>
    <?php

if (isset($_SESSION['massageh'])) {
    echo    "<div class='alert alert-{$_SESSION['msg_typeh']} alert-dismissible fade show ' role='alert'><i class='fa fa-check-circle'></i>

<strong> {$_SESSION['massageh']} </storng>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
</button>
</div>
";
    unset($_SESSION['massageh']);
    unset($_SESSION['msg_typeh']);
    
}

?>
    <br><br><br>
    <div class="container">
        <div class="row mb-0">
            <div class="col-md-4">
                <h2 class="text-center">Add Budget</h2>
                <hr><br>
                <form action="controller.php" method="POST">
                    <div class="form-group">
                        <label for="budget">Budget</label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="text" name="budget" class="form-control" id='budget'
                            placeholder=" Enter Your Budget" required>
                    </div>
                    <div class="form-group">
                        <label for="departure">Departure from</label>
                        <input type="text" name="departure" class="form-control" id="departure" placeholder="From where"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="adult">No of people</label>
                        <input type="number" name="adult" class="form-control" id="adult" required>
                    </div>
                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <select class="custom-select" id="destination" name="destination">
                            <option disabled selected>Select Destination</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Sreemongol">Sreemongol</option>
                            <option value="Bichanakandi">Bichanakandi</option>
                            <option value="Ratargul">Ratargul</option>
                            <option value="Jaflong">Jaflong</option>
                            <option value="Cox's bazar">Cox'sBazar/option>
                            <option value="Panthumai">Panthumai</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Chattogram">Chattogram</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Dinajpur">Dinajpur</option>
                        </select>
                    </div>

                    <button type="submit" name="save" class="btn btn-primary btn-block">Save</button>
                    <a href="controller.php?reset=1" class="btn btn-danger btn-block">Reset</a>
                </form>
            </div>
            <div class="col-md-8">
                <h2 class="text-center">Expenses List</h2>
                <hr>
                <br><br>


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


                <?php

                $result = mysqli_query($con, "SELECT * FROM expenselist");
                ?>
                <div class="row justify-content-center">
                    <table class="table table-striped table-hover ">
                        <thead style="background-color:#B8DAFF;">
                            <tr>
                                <th>Selected Item</th>
                                <th>Cost</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <?php
                        while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td> &#2547;<?php echo $row['amount']; ?></td>
                            <td class="text-center">
                                <a href="controller.php?delete=<?php echo $row['id']; ?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </table>
                </div>

                <div class="row ">

                    <table class="table text-center">
                        <thead style="background-color:#B8DAFF;">
                            <tr>
                                <th>Budget</th>
                                <th>Destination</th>
                                <th>Total expensese</th>
                                <th>Residue</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-bordered">
                            <td>&#2547;<?php echo $budget_amount; ?></td>
                            <td><?php echo $destination; ?></td>
                            <td>&#2547;<?php echo $total; ?></td>
                            <td> &#2547;<?php echo $residue; ?> </td>

                            <td> <a href="" class="btn btn-success btn-sm btn-block "><i class='fa fa-check-circle'></i>
                                    Accept</a></td>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <hr>
        <hr class="w-50">


        <div class=" table-responsive">
            <h3 class="text-center text-uppercase">Transportation</h3>
            <table class=" table table-striped table-hover">
                <thead class="thead-dark justify-conent-center">
                    <tr>
                        <th>Tranport Name</th>
                        <th>Cost</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($transport_result)) : ?>
                    <tr>
                        <td><?php echo $row['t_name']; ?></td>
                        <td> &#2547;<?php echo $row['cost']; ?></td>
                        <td>
                            <a href="controller.php?select1=<?php echo $row['id']; ?>"
                                class="btn btn-success">Select</a>
                        </td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>

        <?php

       // $hotel_result = mysqli_query($con, "SELECT * FROM hotels WHERE place = '$destination' AND 
       // (cost > '$budget_amount') ");

        ?>

        <div class="table-responsive">
            <h3 class="text-center text-uppercase">Hotels</h3>
            <table class=" table table-striped table-hover">
                <thead class="thead-dark justify-conent-center">
                    <tr>
                        <th>Hotel Name</th>
                        <th>Cost</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($hotel_result)) : ?>
                    <tr>
                        <td><?php echo $row['h_name']; ?></td>
                        <td> &#2547;<?php echo $row['cost']; ?></td>
                        <td>
                            <a href="controller.php?select=<?php echo $row['id']; ?>" class="btn btn-success">Select</a>
                        </td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>

        <hr class="w-50  text-warning">
        <?php

        //  $restaurent_result = mysqli_query($con, "SELECT * FROM restaurent WHERE place = '$destination' AND 
        // (cost > '$budget_amount') ");

        ?>

        <div class=" table-responsive">
            <h3 class="text-center text-uppercase">Restaurents</h3>
            <table class=" table table-striped table-hover">
                <thead class="thead-dark justify-conent-center">
                    <tr>
                        <th>Restaurents Name</th>
                        <th>Cost</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($restaurent_result)) : ?>
                    <tr>
                        <td><?php echo $row['r_name']; ?></td>
                        <td> &#2547;<?php echo $row['cost']; ?></td>
                        <td>
                            <a href="controller.php?select2=<?php echo $row['id']; ?>"
                                class="btn btn-success">Select</a>
                        </td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
        <hr class="w-50  text-warning">
        <?php

        // $entertainment_result = mysqli_query($con, "SELECT * FROM entertainment WHERE place = '$destination' AND 
        // (cost > '$budget_amount') ");

        ?>

        <div class=" table-responsive">
            <h3 class="text-center text-uppercase">Entertainment Spots</h3>
            <table class=" table table-striped table-hover">
                <thead class="thead-dark justify-conent-center">
                    <tr>
                        <th>Spot Name</th>
                        <th>Cost</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($entertainment_result)) : ?>
                    <tr>
                        <td><?php echo $row['e_name']; ?></td>
                        <td> &#2547;<?php echo $row['cost']; ?></td>
                        <td>
                            <a href="controller.php?select3=<?php echo $row['id']; ?>"
                                class="btn btn-success">Select</a>
                        </td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>

    </div>


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