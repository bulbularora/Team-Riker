<?php 
include ("php/db.php");

$validate = true;
$error = "";
$reg_email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_uname = "/^[a-zA-Z0-9_-]+$/";
$reg_pswd = "/^(\S*)?\d+(\S*)?$/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $uname = trim($_POST["uname"]);
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);
  $cpassword = trim($_POST["cpassword"]);
       
  $db = new mysqli($server, $username, $dbpassword, $dbname);
    if ($db->connect_error) {
        die ("Connection failed: " . $db->connect_error);
    }
    
  $q1 = "SELECT * FROM User WHERE email = '$email' ";
  $r1 = $db->query($q1);

  //if the email address is already taken.
  if($r1->num_rows > 0) {
    $validate = false;
    $error_email = "Email is already taken. Try with another email.";
  } else {

    if($uname == null || $uname == "" ) {
      $validate = false;
      $error_uname = "Username is empty.";
    } 
    // else if (preg_match($reg_uname, $username)) {
    //   $validate = false;
    //   $error_uname = "Invalid username.";
    // }
    
    if($email == null || $email == "" ) {
      $validate = false;
      $error_email = "Email address is empty.";
    } 
    // else if (preg_match($reg_email, $email)) {
    //   $validate = false;
    //   $error_email = "Invalid email address. Email addresss should be: example@example.com";
    // }
        
    if($password == null || $password == "" ) {
       $validate = false;
       $error_pswd = "Password is empty.";
    } 

    if($password != $cpassword){
      $validate = false;
      $error_pswd = "Password and confirm password do not match.";
    }
    // else if (preg_match($$reg_pswd, $password)) {
    //   $validate = false;
    //   $error_pswd = "Invalid password. It must have at least non-letter character.";
    // } else if (strlen($password) > 10) {
    //   $validate = false;
    //   $error_pswd = "Password cannot be more than 10 characters.";
    // }

    // if($cpassword == null || $cpassword == "" || $cpassword === $password) {
    //   $validate = false;
    //   $error_cpswd = "Password and Confirmation Password do not match.";
    // }
  }

  if($validate == true) {
    $q2 = "INSERT INTO User (username, email, password) VALUES ('$uname', '$email', '$password')";
    $r2 = $db->query($q2);
        
    if ($r2 === true) {
      header("Location: index.php");
      $db->close();
      exit();
    }
  } else {
    $error = "Invalid data entered. Signup failed.";
    $db->close();
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <!-- <script type="text/javascript" src="js/validate-forms.js"> </script> -->
    <title>Sign Up</title>
  </head>
  <body class = "grid-container">

    <div class="header">
      <h2 class="logo">
        <img src="icon/calendar.png" width="30" height="30"/>
        RSA
      </h2>
      <div>
        <ul>
          <li><a href="index.php">Log In</a></li>
          <li><a class="active" href="signup.php">Sign Up</a></li>
        </ul>
      </div>
    </div>

    <div class="main">

      <form id="signup-form" action="signup.php" method="post" class="signup-form">
        <h2>Sign Up</h2>

        <label for="name">Username: </label>
        <label id="msg_uname" class="err_msg"><?php echo $error_uname ?></label><br>
        <input style="width: 50%" type="text" name="uname" id="uname"><br>
        <br>

        <label for="email">Email: </label>
        <label id="msg_email" class="err_msg"><?php echo $error_email ?></label><br>
        <input style="width: 50%" type="text" name="email" id="email"><br>
        <br>

        <label for="password">Password: </label>
        <label id="msg_pswd" class="err_msg"><?php echo $error_pswd ?></label><br>
        <input style="width: 50%" type="password" name="password" id="password"><br>
        <br>

        <label>Confirm Password: </label>
        <label id="msg_pswdr" class="err_msg"><?php echo $error_cpswd ?></label><br>
        <input style="width: 50%" type="password" name="cpassword" id="cpassword"><br>
        <br>

        <input type="submit" class="btn btn-primary" value="Sign Up"><br>

        <label class="err_msg">
          <?php echo $error ?>
        </label>
        <br />
        <br />
        <a href="index.php" >Already have an account? Log in here!</a>
      </form>
    </div>

    <div class="left">
      <br>
      <img src="icon/calendar.png" />
    </div>
    <!-- <div class="right">
    </div> -->


    <div class="footer">

      <p class="foot">
        <i class="fas fa-carrot"></i>
        RIKER SCHEDULING &copy 2021
      </p>
    </div>

    <!-- <script type="text/javascript" src="js/signup-r.js"></script> -->
  </body>
</html>
