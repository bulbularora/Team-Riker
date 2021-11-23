<?php 
include "db.php";

session_start();

$validate = true;
$error = "";
$title = "";

if (isset($_POST["submitted"]) && $_POST["submitted"])
{
    $title = trim($_POST["title"]);
    $coursename = trim($_POST["coursename"]);
    $assignment_type = trim($_POST["assignment-type"]);
    $date = trim($_POST["due-date"]);
    $time = trim($_POST["due-time"]);
    $desc = trim($_POST["message"]);

    //$user_id = $_SESSION["user_id"];
    
       
    $db = new mysqli($port, $datab, $password_db, $datab);
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
        
    }

    $user_email = $_SESSION["email"];

    
    $q1 = "SELECT user_id FROM user WHERE email = '$user_email'";
    $r1 = $db->query($q1);
    $row1 = $r1->fetch_assoc();
    $userid = $row1["user_id"];

    if($validate == true)
    {
        
        $q2 = "INSERT INTO events ( user_id, title , course_name, type, due_date, due_time, description, state)
         VALUES ( '$userid', '$title', '$coursename', '$assignment_type', '$date', '$time', '$desc', 'todo')";
        $r2 = $db->query($q2);
        
        if ($r2 === true)
        {
            header("Location: kanban.php");
            $db->close();
            echo "Hello, you are at the kanban board.";
            exit();
        }
    }
    else
    {
        $error = "event could not be registered.";
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
  <link rel="shortcut icon" href="">
  <script type="text/javascript" src="js/validate-forms.js"> </script>
  <title>Create Event</title>
</head>
<body class = "text-center grid-container">
<div class="header">
    <h2 class="logo">    
    RSA</h2>
    <div>
        <ul>
            <li><a href="index.php">Log In</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a class="active" href="create-event.php">Create Event</a></li>
            <li><a href="kanban.php">Kanban</a></li>
            <li><a href="calendar.php">Calendar</a></li>
        </ul>
    </div>
</div>
<?php
    if(isset($_SESSION["email"])){
        echo "true";
        echo ($_SESSION["email"]);
        echo "user : " .$userid;

?>
<div class="main">
    <h2>Create an Event</h2>
    <br>
    <form class="create-event-form" id="create-event-form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="submitted" value="1"/>

      <div class="float-left" >
        <label for="title">Title: </label>
        <label id="msg_title" class="err_msg"></label><br>
        <input style="width: 100%" type="text" name="title" id="title">
        <br>

        <label>Course name: </label>
        <label id="msg_course" class="err_msg"></label><br>
        <input style="width: 100%" type="text" name="coursename" id="coursename">
        <br>

        <label>Type: </label><br>
        <select style="width: 100%" class="left-half-inputs" name="assignment-type" id="assignment-type">
            <option value="assignment">Assignment</option>
            <option value="test">Exam</option>
            <option value="lab">Lab</option>
        </select>
        <br><br>

        <label>Due date: </label>
        <label id="msg_duedate" class="err_msg"></label><br>
        <input style="width: 100%" class="left-half-inputs" type="date" name="due-date" id="due-date">
        <br><br>

        <label>Due Time: </label>
        <label id="msg_duetime" class="err_msg"></label><br>
        <input style="width: 100%" class="left-half-inputs" type="time" name="due-time" id="due-time">
        <br><br>
      </div>

      <div class="float-right">
        <label>Description: </label>
        <label id="msg_description" class="err_msg"></label><br>
        <textarea class="" cols="75" id="text" name="message" rows="10" style="width: 80%" type="text">Enter Description here....</textarea>
        <br><br>
          <input type="submit" value="Add">
      </div>
    </form>
    <br>
    <br>

    <div>

<?php

}
else
        {	
            echo "<h3>Please Login or Sign up</h3>";
            echo "<a href='index.php'>Login</a><a href='signup.php'>Signup</a>";	
                    
        }
?>

    </div>

</div>

    

<div class="left">
</div>

<div class="right">
</div>

<div class="footer">

  <p class="foot">
    <i class="fas fa-carrot"></i>
    RIKER SCHEDULING &copy 2021
  </p>

</div>
<!-- <script type="text/javascript" src="js/create-event-r.js"></script> -->
</body>
</html>
