<?php

include "config.php";

if($_GET["id"]){

    $getid = $_GET["id"];

    $sql2 = "SELECT * FROM connectivitya WHERE id = $getid"; 
    $query = mysqli_query($conn,$sql2);

    $data = mysqli_fetch_assoc($query);

    $id = $data["id"];
    $from = $data["start"];
    $to = $data["stop"];
    $brand = $data["brand"];
    $cost = $data["cost"];
}

 if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $brand = $_POST['brand'];
    $cost = $_POST['cost'];

   $sql3= "UPDATE connectivitya SET start='$from', stop='$to', brand='$brand', cost='$cost' WHERE id = '$id' ";


   if(mysqli_query($conn,$sql3)== TRUE){
    header('location: ../../tour_subxm_transport.php');
    echo "data updated";
   }
   else{
    echo "data not updated";
   }

 }


?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>



<div class="card w-25 m-auto boder border-warning">
      <div class="bg-warning ">
        <h4 class="card-title p-2">Update Air Connectivity</h4>
      </div>
       <div class="card-body">
        <div class=" p-2 m-auto">
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
              <div className="form-group mt-2">
                  <label for="from">From</label>
                  <input type="text" name="from" id="from" class="form-control" value="<?php echo  $from ; ?>">
              </div>
              <div class="form-group mt-2">
                  <label for="to">To</label>
                  <input type="text" name="to" id="to" class="form-control" value="<?php echo  $to ; ?>">
              </div>
              <div class="form-group mt-2">
                  <label for="brand">Brand</label>
                  <input type="text" name="brand" id="brand" class="form-control" value="<?php echo  $brand ; ?>">
              </div>
              <div class="form-group mb-3">
                  <label for="name">Cost</label>
                  <input type="text" name="cost" id="cost" class="form-control" value="<?php echo  $cost; ?>">
                  <input type="text" name="id" id="id" class="form-control" value="<?php echo  $id; ?>" hidden>
              </div>
              <div class="form-group mt-3">
                  <input type="submit" value="edit" name="edit" class="btn btn-primary btn-sm form-control" >
              </div>
          </form>
      </div>
       </div>
     </div>


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