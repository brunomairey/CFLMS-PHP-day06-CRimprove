
<?php 
$url = "index.php";
  $url2 = "create.php";
  include 'actions/db_connect.php'; ?>
<!DOCTYPE html>

<html>
<head>
   <title>Add Media</title>

   <style type= "text/css">

    #contactForm {
    margin: 2vw; 
    padding: 2vw; 
    background-color: #f5f5f5 ;
    border-radius: 10px; 
    box-shadow: 5px 10px 18px #888888; 
    width: 60vw;
    position: relative;
    left: 20vw;
  }
      </style>

</head>
<body>
  <div id="contactForm">
<form class="mx-5" action="actions/a_create.php" method= "post">
  

  
    <div class="form-group col-md-12">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" placeholder="title of the media">
    </div>
    <div class="form-row col-md-12">
    <div class="form-group col-md-5 mr-5">
      <label for="author_name">Author Name</label>
      <input type="text" class="form-control" name="author_name" placeholder="Author Name">
    </div>
  
  <div class="form-group col-md-5 ml-5">
      <label for="author_fname">Author first name</label>
      <input type="text" class="form-control" name="author_fname" placeholder="Author Firstname">
    </div>
    </div>

<div class="form-row col-md-12">
      <div class="form-group col-md-4 mr-5">
      <label for="ISBN">ISBN</label>
      <input type="number" class="form-control" name="ISBN" placeholder="10000" step="1">
    </div>

     <div class="form-group col-md-3 mr-5">
     <label for="type">Type</label>
    <select class="form-control" id="exampleFormControlSelect1" name="type">
      <option selected>book</option>
      <option>DVD</option>
      <option>CD</option>
    </select>
  </div>
    <div class="form-group col-md-3">
     <label for="status">Status</label>
    <select class="form-control" id="exampleFormControlSelect1" name="status">
      <option selected>available</option>
      <option>reserved</option>
    </select>
  </div>
</div>
 <div class="form-group col-md-12">
    <label for="short_description">Short Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_description"></textarea>
  </div>


 <div class="form-group col-md-12">
    <label for="publisher_name">Publisher Name</label>
    <input type="text" class="form-control" name="publisher_name" placeholder="Publisher Name">
    </div>
<div class="form-group col-md-12">
    <label for="publisher_address">Publisher Address</label>
    <input type="text" class="form-control" name="publisher_address" placeholder="Publisher Address">
    </div>
  <div class="form-row col-md-12">
    <div class="form-group col-md-5 mr-5">
      <label for="publisher_zip">Publisher Zipcode</label>
      <input type="number" class="form-control" name="publisher_zip" placeholder="1030" step="1">
    </div>
    <div class="form-group col-md-5 ml-5">
    <label for="publisher_city">Publisher City</label>
    <input type="text" class="form-control" name="publisher_city" placeholder="Vienna">
    </div>
  </div>
 <div class="form-row col-md-12">
     <div class="form-group col-md-5 mr-5">
      <label for="publisher_date">Publisher Date</label>
      <input type="date" class="form-control" name="publisher_date">
    </div>
    <div class="form-group col-md-5 ml-5">
     <label for="publisher_size">Publisher size</label>
    <select class="form-control" id="exampleFormControlSelect1" name="publisher_size">
      <option selected>small</option>
      <option>medium</option>
      <option>big</option>
    </select>
  </div>
</div>


    <div class="form-group col-md-12">
    <label for="img">Image link</label>
    <input type="text" class="form-control" name="img" placeholder="Insert Image link">
    </div>
  <!--   please let this code - it is to import an image from file server
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div> -->
  <div class="col-md-12">
  <button type="submit" class="btn btn-dark btn-lg mx-5">Insert Media</button>
   <a class="btn btn-dark btn-lg" href="index.php" type="button" role="button">
    Back to main Page
  </a>
</div>
</form>
</div>
<?php $connect->close(); ?>
</body>
<?php echo $footer; ?>
</html>