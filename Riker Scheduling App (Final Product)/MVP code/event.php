<?php 
    session_start(); 
    if(!isset($_SESSION["username"])) {
        header("Location: loginpage.php");
        exit();
    } else {
        $validate = true;
        $error = "";
        $title = "";

        include "db.php";
        $db = new mysqli($server, $username, $dbpassword, $dbname);
        if ($db->connect_error)
        {
            die ("Connection failed: " . $db->connect_error);
                
        }

        $user_id = $_SESSION["user_id"];
        $e_id = $_GET["id"];

        $q1 = "SELECT * FROM Events WHERE event_id='$e_id'";
        $r1 = $db->query($q1);
        $row1 = $r1->fetch_assoc();

        if (isset($_POST["submitted"]) && $_POST["submitted"])
        {
            $title = trim($_POST["title"]);
            $coursename = trim($_POST["coursename"]);
            $assignment_type = trim($_POST["assignment-type"]);
            $date = trim($_POST["due-date"]);
            $time = trim($_POST["due-time"]);
            $desc = trim($_POST["message"]);

            if($title == null || $title == "" ) {
                $validate = false;
                $error_title = "Title cannot be empty.";
            }
            
            if($coursename == null || $coursename == "" ) {
                $validate = false;
                $error_coursename = "Course name cannot be empty.";
            }
            
            if($date == null || $date == "" ) {
                $validate = false;
                $error_date = "Due date cannot be empty.";
            } 

            if($time == null || $time == "" ) {
                $validate = false;
                $error_time= "Due time cannot be empty.";
            } 

            if($validate == true)
            {
                
                $q2 = "UPDATE Events SET title='$title', course_name='$coursename', type='$assignment_type', due_date='$date', due_time='$time', description='$desc' WHERE event_id='$e_id'";
                $r2 = $db->query($q2);
                
                if ($r2 === true)
                {
                    header("Location: kanban.php");
                    $db->close();
                    exit();
                }
            }
            else
            {
                $error = "Event could not be registered.";
                echo $error;
                $db->close();
            }

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
            <img src="icon/calendar.png" width="30" height="30"/>
            RSA
        </h2>
        <span class="userinfo">
            Logged in as: <br>
            <a href="">
                <img src="icon/account-icon.png" class="icon" width="25" height="25" />
                <?php echo $_SESSION["username"] ?>
            </a>
            <a href="logout.php">
                <img src="icon/logout.png" class="icon" width="25" height="25" />
            </a>
        </span>
        <div>
            <ul>
                <li><a href="create-event.php">Create Event</a></li>
                <li><a href="kanban.php">Kanban</a></li>
                <li><a href="list.php">List</a></li>
                <li><a href="month-view.php">Calendar</a></li>
            </ul>
        </div>
    </div>
<div class="main">
    <h2>Change Event: <?=$row1["title"]?></h2>
    <p class="err_msg">To keep changes click on "Save"</p>
    <br>
    <form class="create-event-form" id="create-event-form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="submitted" value="1"/>

      <div class="float-left" >
        <label for="title">Title: </label>
        <label id="msg_title" class="err_msg"><?php echo $error_title ?></label><br>
        <input style="width: 100%" type="text" name="title" id="title" value="<?=$row1["title"]?>">
        <br>

        <label>Course name: </label>
        <label id="msg_course" class="err_msg"><?php echo $error_coursename ?></label><br>
        <input style="width: 100%" type="text" name="coursename" id="coursename" value="<?=$row1["course_name"]?>">
        <br>

        <label>Type: </label><br>
        <select style="width: 100%" class="left-half-inputs" name="assignment-type" id="assignment-type">
            <option <?php if($row1["type"] == 'assignment'){echo("selected");}?> value="assignment">Assignment</option>
            <option <?php if($row1["type"] == 'exam'){echo("selected");}?> value="exam">Exam</option>
            <option <?php if($row1["type"] == 'lab'){echo("selected");}?> value="lab">Lab</option>
        </select>
        <br><br>

        <label>Due date: </label>
        <label id="msg_duedate" class="err_msg"><?php echo $error_date ?></label><br>
        <input style="width: 100%" class="left-half-inputs" type="date" name="due-date" id="due-date" value="<?=$row1["due_date"]?>">
        <br><br>

        <label>Due Time: </label>
        <label id="msg_duetime" class="err_msg"><?php echo $error_time ?></label><br>
        <input style="width: 100%" class="left-half-inputs" type="time" name="due-time" id="due-time" value="<?=$row1["due_time"]?>">
        <br><br>
      </div>

      <div class="float-right">
        <label>Description: </label>
        <label id="msg_description" class="err_msg"></label><br>
        <textarea class="" cols="75" id="text" name="message" rows="10" style="width: 80%" type="text"><?=$row1["description"]?></textarea>
        <br><br>
          <input type="submit" value="Save">
      </div>
    </form>
    <br>
    <br>

    <div>

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
