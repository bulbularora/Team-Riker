<?php
include "db.php";

$validate = true;

$email = "";
$error = "";

if (isset($_POST["submitted"]) && $_POST["submitted"])
{
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    
    $db = new mysqli($port, $datab, $password_db, $datab );
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
    
    $q = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $r = $db->query($q);
    $row = $r->fetch_assoc();
    
    if($email != $row["email"] && $password != $row["password"])
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

        session_start();
        $_SESSION["email"] = $row["email"];
        header("Location: kanban.php");
        $db->close();
        exit();
    }
    else 
    {
        $error = "The email/password combination was incorrect. Login failed.";
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
  <script type="text/javascript" src="js/validate-forms.js"> </script>
  <title>Login - Riker Scheduling</title>
</head>
<body class="grid-container">
    <div class="header">
        <h2 class="logo">RSA</h2>
        <div>
          <ul>
            <li><a class="active" href="index.php">Log In</a></li>
            <li><a href="signup.php">Sign Up</a></li>
          </ul>
        </div>
    </div>
    <div class="main">
      <br>
        <h2>Welcome to Riker Scheduling!</h2><br><h2>Log In</h2>

      <form id="login-form" class="login-form" method="post" action="index.php">
      <input type="hidden" name="submitted" value="1"/>
        <label>Email: </label>
        <label id="msg_email" class="err_msg"></label><br />
        <input type="text" name="email" id="email"><br />
        <br>

        <label>Password: </label>
        <label id="msg_pswd" class="err_msg"></label><br />
        <input type="password" name="password" id="pass"><br />

        <br>
        <input type="submit" value="Log In">
      </form>

      <label id="display_info" class="err_msg"></label><br />
      <br>
      <br>
      <a href="signup.php">Don't have an account? Sign up here!</a>
    </div>


    <div class="footer">

      <p class="foot">
        <i class="fas fa-carrot"></i>
        RIKER SCHEDULING &copy 2021
      </p>

    </div>

    <script type="text/javascript" src="js/index-r.js"></script>
</body>
</html>
