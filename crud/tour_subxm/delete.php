
 <?php 

   include 'config.php';
    
          if(isset($_GET["id"])){
             $id = $_GET["id"];
             $sql2 = "DELETE FROM connectivity WHERE id = $id";
             if(mysqli_query($conn,$sql2)==TRUE){
               header('location: ../../tour_subxm_transport.php');
             }
             else{
                echo "Data Not Deleted";
             }

          }
        
?>