
<?php 
$url = "../index.php";
  $url2 = "../create.php";
require_once 'db_connect.php';

if ($_POST) {
   $id = $_POST['id'];

   $sql = "DELETE FROM `media` WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
       echo "<h4 class=\"text-success mx-5 my-3\">Successfully deleted!!</h4>" ;
       echo "<a href='../index.php'><button type='button' class=\"btn btn-dark mx-5\">Back to the main menu</button></a>";
   } else {
       echo "Error updating record : " . $connect->error;
   }

   $connect->close();
}

?>
<?php echo $footer; ?>