<?php 
include "db.php";

$validate = true;
$error = "";
$email = "";

if (isset($_POST["submitted"]) && $_POST["submitted"])
{
    $firstname = trim($_POST["fname"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
       
    $db = new mysqli($port, $datab, $password_db, $datab);
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
        
    }
    
    $q1 = "SELECT * FROM user WHERE email = '$email' ";
    $r1 = $db->query($q1);

    if(r1 == false){
        echo "hello";
    }

    // if the email address is already taken.
    if($r1->num_rows > 0)
    {
        $validate = false;
    }
    else
    {
       
        if($email == null || $email == "" )
        {
            $validate = false;
        }
        
        if($password == null || $password == "" )
        {
            $validate = false;
        }
    }

    if($validate == true)
    {
        
        $q2 = "INSERT INTO user ( name , email, password)
         VALUES ('$firstname', '$email', '$password')";
        $r2 = $db->query($q2);
        
        if ($r2 === true)
        {
            header("Location: index.php");
            $db->close();
            echo "Hello, you are here.";
            exit();
        }
    }
    else
    {
        $error = "email address is not available. Signup failed.";
        echo $error;
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
      <h2 class="logo">RSA</h2>
      <div>
        <ul>
          <li><a href="index.php">Log In</a></li>
          <li><a class="active" href="signup.php">Sign Up</a></li>
        </ul>
      </div>
    </div>

    <div class="main">

      <form  id="signup-form" action="signup.php" method="post" class="signup-form">
      <input type="hidden" name="submitted" value="1"/>
      <h2>Sign Up</h2>

        <label for="name">Name: </label><br>
        <input type="text" name="fname" id="fname"><br>
        <label id="msg_fname" class="err_msg"></label><br>
        <br>

        <label for="email">Email: </label>
        <label id="msg_email" class="err_msg"></label><br>
        <input type="text" name="email" id="email"><br>
        <br>

        <label for="password">Password: </label>
        <label id="msg_pswd" class="err_msg"></label><br>
        <input type="password" name="password" id="password"><br>
        <br>

        <label>Confirm Password: </label>
        <label id="msg_pswdr" class="err_msg"></label><br>
        <input type="password" name="cpassword" id="cpassword"><br>
        <br>

        <input type="submit" class="btn btn-primary" value="Sign Up">

        <label id="display_info" class="err_msg"></label>
        <br />
        <br />
        <a href="index.php" >Already have an account? Log in here!</a>
      </form>
    </div>


    <div class="footer">

      <p class="foot">
        <i class="fas fa-carrot"></i>
        RIKER SCHEDULING &copy 2021
      </p>

    </div>

    <!-- <script type="text/javascript" src="js/signup-r.js"></script> -->
  </body>
</html>
