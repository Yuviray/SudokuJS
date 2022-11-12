<?php
namespace Tester;
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE user_name = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['pwd']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" type="text/css" href="Frontedstyle.css">
    <title>Login</title>
  </head>
  <body>
  <div class="center">
        <h1>Sudoku Plus Login</h1>
        <form class="" action="" method="post" autocomplete="off">

            <div class="text-field">
            <input type="text" name="usernameemail" id = "usernameemail" required value="">
                <span></span>
                <label for="usernameemail">Username or Email : </label>
            </div>

            <div class="text-field">
                <input type="password" name="password" id = "password" required value=""> 
                <span></span>
                <label for="password">Password : </label>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Login</button>
            </div>
            <br> &emsp;&nbsp;
            New User? Click <a href="register.php">Here</a> to Register
        </form>
    </div>
    
  </body>
</html>