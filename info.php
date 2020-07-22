<?php 
$url = "index.php";
  $url2 = "create.php";
require_once 'actions/db_connect.php';

if (isset($_GET['id'])) {
   $id = $_GET['id'];

    $sql = "SELECT * FROM `media` WHERE id = {$id}" ;
   $result = $connect->query($sql);
   
   $row = $result->fetch_assoc();

   
   $connect->close();
// echo $data;

?>

<!DOCTYPE html>
<html>
<head>
   <title >Show Media</title>

   <style type= "text/css">
   
   </style>

</head>
<body>

<div class="card border-dark mx-1 my-4" style="position: relative; left: 10vw; width: 80vw;">
           
             <div class="card text-white bg-secondary">
              <div class="card-header bg-dark align-middle">
              <h5><b><?= $row['type'] ?>
                  <span class="text-right" style="float: right"><a href="publish.php?id=<?= $row['id']?>"><button class="btn btn-outline-light" type='button'><?= $row['publisher_name'] ?></button></a></span></b></h5>
                  </div>
              <div class="row no-gutters">
                <div class="col-md-4">  
                    <img src="<?= $row['img'] ?>" class="card-img-top">
                </div>
                <div class="col-md-8">  
                  

                  <div class="card-body">
                      <b><h3 class="card-title"><?= $row['title'] ?></h3></b>
                      <h6 class="card-text">
                    <b><h4><?= $row['author_name']." ".$row['author_fname'] ?></h4></b>
                    <p><br>
                      ISBN: <?= $row['ISBN'] ?></p>
                      <p>Description: <br>
                      <?= $row['short_description'] ?></p><br>
                      <p><h5> Status at the library: <b>
                        <?php if($row['status']=="available") {
                          echo "<span class=\"text-success\"> ".$row['status']."</span>"; ?>
                      <a href="reserve.php?id=<?= $row['id']?>"><button class="btn btn-light btn-lg mx-3" type='button'>Reserve Media</button></a>

                        <?php }
                          else {
                            echo  "<span class=\"text-danger\"> ".$row['status']."</span>";
                          }

                           ?></b></h5></p>
                      <table style= "width: 60%">
                        <tr><th colspan="2"><h5> Information about the Publisher </h5></th></tr>
                       <tr><td> Publisher Name: </td><td> <?= $row['publisher_name'] ?></td></tr>
                        <tr><td> Publisher address: </td><td> <?= $row['publisher_address'] ?></td></tr>
                         <tr><td> Publisher Zip Code:</td><td><?= $row['publisher_zip']?> </td></tr>
                         <tr><td>Publisher city:</td><td><?= $row['publisher_city'] ?></td></tr>
                          <tr><td> Publisher date:</td><td><?= $row['publisher_date'] ?></td></tr> 
                            <tr><td>Publisher size:</td><td><?= $row['publisher_size'] ?></td></tr>
                      </table>
                     
                    </h6>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-center bg-dark">
              <a href="update.php?id=<?= $row['id']?>"><button class="btn btn-light btn-lg mx-3" type='button'>Edit</button></a>
                <a href="delete.php?id=<?= $row['id']?>"><button  class="btn btn-outline-light btn-lg mx-3" type='button'>Delete</button></a>
                <a class="btn btn-outline-light btn-lg mx-3" href="index.php" type="button" role="button">
    Back to main Page
  </a>
            </div>
      </div> 

  



                   <?php ;
               
           } else  {
               echo  "No result";
           } ?>







</body >
<?php echo $footer; ?>
</html >
