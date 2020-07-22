<?php 
$url = "../index.php";
  $url2 = "../create.php";
require_once 'db_connect.php';

if ($_POST) {
    $title = addslashes($_POST['title']);
   $author_name = $_POST['author_name'];
   $author_fname = $_POST['author_fname'];
    $ISBN = $_POST['ISBN'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $short_description = addslashes($_POST['short_description']);
     $publisher_name = $_POST['publisher_name'];
     $publisher_address = $_POST['publisher_address']; 
      $publisher_zip = $_POST['publisher_zip']; 
       $publisher_city = $_POST['publisher_city']; 
        $publisher_date = $_POST['publisher_date'];
         $publisher_size = $_POST['publisher_size'];
        $img = $_POST['img'];

   $id = $_POST['id'];

   $sql = "UPDATE `media` SET `title` = '$title', `author_name` = '$author_name', `author_fname` = '$author_fname', 
        `ISBN` = '$ISBN', `type` = '$type', `status` = '$status',
        `short_description` = '$short_description', `publisher_name` = '$publisher_name', `publisher_address` = '$publisher_address',
       `publisher_zip` = '$publisher_zip', `publisher_city` = '$publisher_city',`publisher_date` = '$publisher_date', 
       `publisher_size` = '$publisher_size', `img` = '$img' WHERE id = {$id}" ;



   if($connect->query($sql) === TRUE) {
       echo  "<h4 class=\"text-success mx-5 my-3\">Successfully Updated</h4>";
       echo "<a href='../update.php?id=" .$id."'><button type='button' class=\"btn btn-dark mx-5\">Update a new media</button></a>";
       echo  "<a href='../index.php'><button type='button' class=\"btn btn-dark\">Home</button></a>";
   } else {
        echo "Error while updating record : ". $connect->error;
   }

   $connect->close();

}

?>
<?php echo $footer; ?>