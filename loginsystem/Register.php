<?php

include 'config.php';
error_reporting(0);

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5( $_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword){
         $sql = "SELECT * FROM users WHERE email ='$email'";
         $result = mysqli_query($conn,$sql);
         if(!$result->num_rows  >0){
            $sql="INSERT INTO users (username,email,password)
                  VALUES ('$username','$email','$password')";
            $result=mysqli_query($conn, $sql);
               if ($result){
                  echo"<script>alert('User Registration Completed.')</script>";
                  $username="";
                  $email="";
                  $_POST['password']="";
                  $_POST['cpassword']="";
              } else {
               echo"<script>alert('Woops! Something went wrong !!')</script>";
              }
         }else{
            echo"<script>alert('Woops! Email is already taken!!')</script>";
            }
      }else{
         echo"<script>alert('Password not matched')</script>";
      }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
   
</head>
<body>
    
   
      <div class="container">
          <form action="" method="POST" class="login-email">
             <p class="login-text" style="font-size: 2rem; font-weight:800;">Register</p>
               <div class="input-group">
                  <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
               </div>
               <div class="input-group">
                  <input type="email" placeholder="Email"name="email" value="<?php echo $email; ?>" required>
               </div>
               <div class="input-group">
                  <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
               </div>
               <div class="input-group">
                  <input type="password" placeholder="Confirm password" name="cpassword" value="<?php $_POST['cpassword']; ?>" required>
               </div>
               <div class="input-group">
                  <button name="submit" class="btn">Register</button>
               </div>
               <p class="login-register-text"> have an account ? <a href="index.php">Login Here</a></p>
          </form>
       </div>
  </body>
</html>