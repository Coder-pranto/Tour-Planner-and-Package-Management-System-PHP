<?php
include "config.php";
$sql = "SELECT *FROM connectivity";
$result = mysqli_query($conn, $sql);

?>



<!doctype html>
<html lang="en">

<head>
    <title>Test Modal</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>







    <!-- connectivity table start -->
    <div class="container w-50 text-center mt-4">

        <div class="text-left border border-dark text-center bg-warning p-1">
            <h2> Local Connectivity <i class="fa fa-bus" aria-hidden="true"></i></h2>
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
                            <a href=<?php echo "edit.php?id=$id"; ?> class="btn btn-primary btn-sm" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                            <a href=<?php echo "delete.php?id=$id"; ?> class="btn btn-danger btn-sm"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php
                }
                 
                ?>

            </tbody>
        </table>
    </div>

    <!-- connectivity table end -->
    <!-- data-toggle="modal" data-target="#UpdateLocation" -->

    <!-- ADD Modal start -->

    <div class="text-center">
        <button type="button" class="btn btn-outline-primary p-2 btn-sm" data-toggle="modal" data-target="#AddLocation">Add Connectivity</button>
    </div>

    <div class="modal fade " id="AddLocation" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog border border-warning border-2 rounded" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title ">Add Place Connectivity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="insert.php" method="POST" id="saveLocation">
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
                        <div class="pt-2"> <input type="submit" class="btn btn-success" value="Insert" name="submit" class="form-control"></div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add modal end  -->





    <!--updation -->

    <div class="modal fade " id="UpdateLocation" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog border border-warning border-2 rounded" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title ">Update Place Connectivity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="saveLocation">
                        <div class="mb-3">
                            <label for="from">From:</label>
                            <input type="text" name="from" id="from" value="<?php echo $from; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="to">To:</label>
                            <input type="text" name="to" id="to" value="<?php echo $to ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="cost">Cost:</label>
                            <input type="text" name="cost" id="cost" value="<?php echo $cost ?>" class="form-control">
                        </div>
                        <div class="pt-2"> <input type="submit" class="btn btn-success" value="Insert" name="submit" class="form-control"></div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>






    <!-- Optional JavaScript -->


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>



