<?php 
 ob_start();
session_start();
if(!isset($_SESSION["user"]) && !isset($_SESSION["admin"])){
  header("Location: index.php");
}elseif(isset($_SESSION["user"])){
  header("Location: home.php");
  // header("Refresh: 5; url= admin.php")
}
   $url = "index.php";
  $url2 = "create.php";
  $logoutlink="";
  if ( isset($_SESSION['admin'])!="" ) {
 $logoutlink= "<form class=\"form-inline my-2 my-lg-0\">
         <a href=\"actions/logout.php?logout\"><button class=\"btn btn-outline-light my-2 my-sm-0\" type=\"button\">Logout</button></a>
    </form>";
// echo $logoutlink;
}
include 'actions/db_connect.php';
echo "whatever"; ?>

<!DOCTYPE html>
<html>
<head>
  

   <title>The Library</title>

   
</head>
<body>



<div class="row row-cols-3 my-5 mx-2 justify-content-around">
	

<?php
           $sql = "SELECT * FROM media";
           $result = $connect->query($sql);

if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {


                   ?>

                 
      	<div class="card border-dark mx-1 mb-4" style="max-width: 30vw;">
      		 
      		 	 <div class="card h-100 text-white bg-secondary">
      		 	 	<div class="card-header bg-dark align-middle">
							<h5><b><?= $row['type'] ?>
        					<span class="text-right" style="float: right"><a href="publish.php?publisher_id=<?= $row['publisher_id']?>"><button class="btn btn-outline-light" type='button'><?= $row['publisher_name'] ?></button></a></span></b></h5>
        					</div>
      		 	 	<div class="row no-gutters">
      		 			<div class="col-md-6">	
            				<img src="<?= $row['img'] ?>" class="card-img-top">
        				</div>
        				<div class="col-md-6">	
        					

        					<div class="card-body">
            					<b><h4 class="card-title"><?= $row['title'] ?></h4></b>
            					<h6 class="card-text">
       							<b><h5><?= $row['author_name']." ".$row['author_fname'] ?></h5></b>
       							<p><br>
            					</p></h6>
            					<div class="text-center"><a href="info.php?id=<?= $row['id']?>"><button class="btn btn-light btn-lg mx-3" type='button'>Show Media</button></a></div>
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="card-footer text-center bg-dark">
        			<a href="update.php?id=<?= $row['id']?>"><button class="btn btn-light btn-lg mx-3" type='button'>Edit</button></a>
            		<a href="delete.php?id=<?= $row['id']?>"><button  class="btn btn-outline-light btn-lg mx-3" type='button'>Delete</button></a>
        		</div>
			</div> 

	



                   <?php ;
               }
           } else  {
               echo  "No result";
           } 

           ?>


</div>

<?php echo $footer; ?>
</body>


