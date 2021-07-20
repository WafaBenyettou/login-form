<?php
include 'config.php';
error_reporting(0);
session_start();

if(isset($_POST['submit'])){
   $email=$_POST['email'];
   $password=md5($_POST['password']);
   
   $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
   $result=mysqli_query($conn,$sql);
     if($result->num_rows > 0){
       $row=mysqli_fetch_assoc($result);
       $_SESSION['username']= $row['username'];
       header("Location: welcome.php");
     }else{
      echo"<script>alert('Woops! Email or Password inncorecct')</script>";
     }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP PROJECT</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
   
</head>
<body>
    
   
      <div class="container">
          <form action="" method="POST" class="login-email">
             <p class="login-text" style="font-size: 2rem; font-weight:800;">Login</p>
               <div class="input-group">
                  <input type="email" placeholder="Email" name="email" value="<?php echo $email;?>" required>
               </div>
               <div class="input-group">
                  <input type="password" placeholder="Password" name="password" value="<?php echo $password;?>" required>
               </div>
               <div class="input-group">
                  <button name="submit" class="btn">Login</button>
               </div>
               <p class="login-register-text">Dont have an account ? <a href="register.php">Register Here</a></p>
          </form>
       </div>
  </body>
</html>