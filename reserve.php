<?php 
$url = "index.php";
  $url2 = "create.php";
require_once 'actions/db_connect.php';

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM `media` WHERE id = {$id}" ;
   $result = $connect->query($sql);
   $data = $result->fetch_assoc();

   $connect->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title >Reserve media</title>
</head>
<body>

<h3 class="text-info m-5">Do you really want to reserve this media?</h3>
<form action ="actions/a_reserve.php" method="post">

   <input type="hidden" name= "id" value="<?php echo $data['id'] ?>">
   <button type="submit" class="btn btn-dark mx-5">Yes, reserve it!</button>
   <a href="info.php?id=<?= $data['id']?>"><button type="button" class="btn btn-dark">No, go back!</button></a>
</form>

</body>

<?php
}
?>
<?php echo $footer; ?>
</html>


