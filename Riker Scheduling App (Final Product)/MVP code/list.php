<?php


    session_start();

    if(!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    } else {
        include ("db.php");
        $db = new mysqli($server, $username, $dbpassword, $dbname);
        if ($db->connect_error) {
            die ("Connection failed: " . $db->connect_error);        
        }

        $user_id = $_SESSION["user_id"];

        $q1 = "SELECT * FROM Events WHERE user_id='$user_id' ORDER BY due_date, due_time ";
        $r1 = $db->query($q1);

        
        

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
    <title>List</title>
</head>
<body class="grid-container">

    <div class="header">
        <h2 class="logo">
            <img src="icon/calendar.png" width="30" height="30"/>
            RSA
        </h2>
        <span class="userinfo">
            Logged in as: <br>
            <span>
                <img src="icon/account-icon.png" class="icon" width="25" height="25" />
                <?php echo $_SESSION["username"] ?>
            </span>
            <a href="php/logout.php">
                <img src="icon/logout.png" class="icon" width="25" height="25" />
            </a>
        </span>
        <div>
            <ul>
                <li><a href="create-event.php">Create Event</a></li>
                <li><a href="kanban.php">Kanban</a></li>
                <li><a href="calendar.php">Calendar</a></li>
                <li><a class="active" href="list.php">List</a></li>
            </ul>
        </div>
    </div>

    <div class="footer">

        <p class="foot">
            <i class="fas fa-carrot"></i>
            RIKER SCHEDULING &copy 2021
        </p>

    </div>

    <br>

    <div class="main">
        <h2>Events</h2>
        <?php while($row = $r1->fetch_assoc()){ ?>
        <div>
            <button data-toggle="collapse" data-target =".content" class="collapsible">
                <?= $row["title"] ?>, due on - <?= $row["due_date"]?>
                <img src="icon/dropdown.png" class="icon" width="25" height="25" />
                <?php if ($row["state"] == 'done') {?> 
                    <span class="float-done"><?= $row["state"] ?></span>
                <?php } else if ($row["state"] == 'inprogress') {?>
                    <span class="float-inprogress"><?= $row["state"] ?></span>
                <?php } else if ($row["state"] == 'todo') {?>
                    <span class="float-todo"><?= $row["state"] ?></span>
                <?php }?>
            </button>
            
            <div class="content">
                <p> 
                    <span style="font-weight: bold">Course Name:</span>  <?= $row["course_name"] ?> <br><br>  
                    <span style="font-weight: bold">Type:</span>  <?= $row["type"] ?> <br><br>
                    <span style="font-weight: bold">Description:</span>  <?= $row["description"] ?> <br><br>
                    <span style="font-weight: bold">Time due:</span> <?= $row["due_time"] ?> <br>
                </p>
                <br>
            
            </div>
            <br>
        </div>
        <?php } ?>
    </div>

    <div class="left filter-box">
        <h4> Filter by: </h4>
        <form action="test.php" method="post">
            <input type="hidden" name="submitted" value="1"/>
            <h5>State:</h5>
            <input type="checkbox" name="state[]" value="todo"> <span> To-do</span> <br><br>

            <input type="checkbox" name="state[]" value="inprogress"> <span> In Progress</span> <br><br>

            <input type="checkbox" name="state[]" value="done"> <span> Done</span> <br><br>

            <input type="submit" value="Filter">
        </form>
        <h5>Type:</h5>
    </div>
    <!-- <div class="right">

    </div> -->


<script type="text/javascript" src="js/list.js"> </script>
</body>
</html>
