<?php
 $url = "index.php";
  $url2 = "create.php";
  $logoutlink="";
ob_start();
session_start();
if ( isset($_SESSION['user'])!="" ) {
 header("Location: home.php");
 exit;
}

if ( isset($_SESSION['admin'])!="" ) {
 header("Location: admin.php");
 exit;
}

require_once 'actions/db_connect.php';

// it will never let you open index(login) page if session is set



$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }

 // if there's no error, continue to login
 if (!$error) {
 
  $password = hash( 'sha256', $pass); // password hashing

$sql="SELECT * FROM `users` WHERE userEmail='$email'";
//  echo $sql;
//  echo $pass . "<br>";
// echo $password;

 $res=mysqli_query($connect, $sql);

 // echo $email;
 // var_dump($res);
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  var_dump($row);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
 echo $count;
 echo $row['userPass'];
    if( $count == 1 && $row['userPass' ]==$password ) {
    echo "this is a good reason";
    if($row['status'] == 'admin') {
      $_SESSION['admin'] = $row['userId'];
      header("Location: admin.php");
    }
    else {
      $_SESSION['user'] = $row['userId'];
      header("Location: home.php");
    }

    } else {
    $errMSG = "Incorrect Credentials, Try again later..." ;
      }}
 else {
  echo "something went wrong";
}
 
 }


?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>

</head>
<body>
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off" style="width:80%; position: relative; left: 10%" class="mt-2">
 
   
            <h2>Sign In.</h2 >
            <hr />
           
            <?php
  if ( isset($errMSG) ) {
echo  $errMSG; ?>
             
               <?php
  }
  ?>
           
         
 
        
            <div class="form-group">
               <label for="exampleInputEmail1">Email address</label>
            <input  type="email" name="email"  class="form-control col-md-6 mb-3" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40" class="form-control" id="exampleInputEmail1">
       
            <span class="text-danger"><?php  echo $emailError; ?></span>
 
         </div>
         <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
            <input  type="password" name="pass"  class="form-control col-md-6 mb-3" placeholder ="Your Password" maxlength="15">
       
           <span  class="text-danger"><?php  echo $passError; ?></span>
            
          </div>
            <button class="btn btn-dark" type="submit" name= "btn-login">Sign In</button>
         
         
            <hr>
 
            <a  href="actions/register.php"> <button type="button" class=" btn btn-secondary">Sign Up Here...</button></a>
     
         
   </form>
   </div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>
<?php echo $footer; ?>