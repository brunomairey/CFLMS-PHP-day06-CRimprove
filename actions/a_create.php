<?php 
$url = "../index.php";
  $url2 = "../create.php";
require_once 'db_connect.php';
// I have to add addslashes because there is 
if ($_POST) {
   $title = addslashes($_POST["title"]);
   $author_name = $_POST['author_name'];
   $author_fname = $_POST['author_fname'];
    $ISBN = $_POST['ISBN'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $short_description = addslashes($_POST["short_description"]);
     $publisher_name = $_POST['publisher_name'];
     $publisher_address = $_POST['publisher_address']; 
      $publisher_zip = $_POST['publisher_zip']; 
       $publisher_city = $_POST['publisher_city']; 
        $publisher_date = $_POST['publisher_date'];
         $publisher_size = $_POST['publisher_size'];
        $img = $_POST['img'];

  
  $sql = "INSERT INTO `media` (`title`, `author_name`, `author_fname`, `ISBN`, `type`, `status`, `short_description`, `publisher_name`, `publisher_address`, `publisher_zip`, `publisher_city`, `publisher_date`, `publisher_size`, `img`) 
  VALUES ('$title', '$author_name', '$author_fname', '$ISBN', '$type', '$status', '$short_description', '$publisher_name', '$publisher_address', '$publisher_zip', '$publisher_city', '$publisher_date', '$publisher_size', '$img')";
    if($connect->query($sql) === TRUE) {
       echo "<p class=\"text-success mx-5 my-3\">New Record Successfully Created</p>" ;
       echo "<a href='../create.php'><button type='button' class=\"btn btn-dark mx-5\">Enter a new media</button></a>";
        echo "<a href='../index.php'><button type='button' class=\"btn btn-dark\">Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $connect->connect_error;
   }

   $connect->close();
}

?>
<?php echo $footer; ?>