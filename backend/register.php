<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $test = 0;
  $fname = $_POST["first_name"];
  $lname = $_POST["last_name"];
  $username = $_POST["user_name"];
  $email = $_POST["email"];
  $password = $_POST["pwd"];
  $confirmpassword = $_POST["r_pwd"];
  $score = 0;
  $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE user_name = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO users VALUES('$test','$fname','$lname','$username','$email','$password', '$confirmpassword','$score')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
  }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
  }

}
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>
    <h2>Registration</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="first_name">First Name : </label>
      <input type="text" name="first_name" id = "first_name" required value=""> <br>
      <label for="last_name">Last Name : </label>
      <input type="text" name="last_name" id = "last_name" required value=""> <br>
      <label for="user_name">Username : </label>
      <input type="text" name="user_name" id = "user_name" required value=""> <br>
      <label for="email">Email : </label>
      <input type="email" name="email" id = "email" required value=""> <br>
      <label for="pwd">Password : </label>
      <input type="password" name="pwd" id = "pwd" required value=""> <br>
      <label for="r_pwd">Confirm Password : </label>
      <input type="password" name="r_pwd" id = "r_pwd" required value=""> <br>
      <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="login.php">Login</a>
  </body>
  </html>
