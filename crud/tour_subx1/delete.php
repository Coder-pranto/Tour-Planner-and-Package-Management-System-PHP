
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
 

       if(isset($_GET["id"])){
          $id = $_GET["id"];
          $sql2 = "DELETE FROM connectivitysub11 WHERE id = $id";
          if(mysqli_query($conn,$sql2)==TRUE){
            header('location: ../../tour_subx1c.php');
          }
          else{
             echo "Data Not Deleted";
          }

       }
     
?>