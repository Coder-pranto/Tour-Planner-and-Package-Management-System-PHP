<?php
 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "tourdb";
 
 // Create connection
 $conn = mysqli_connect($servername, $username, $password,$database);
 // Check connection
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }
 

if (isset($_POST['submit'])) {
    $transport = $_POST['transport'];
    $cost = $_POST['cost'];

    $sql = "INSERT INTO connectivitysub11(transport,cost) VALUES('$transport','$cost')";
    
    if (mysqli_query($conn, $sql) == TRUE) {                                      
         header('location: ../../tour_subx1c.php');
         exit;
    } else {
        echo '<script type="text/JavaScript"> alert("Data not inserted"); </script>'; 

    }
}


?>