<?php 
    session_start(); 
    if(!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    } else {
        include "db.php";
        $db = new mysqli($server, $username, $dbpassword, $dbname);
        if ($db->connect_error) {
            die ("Connection failed: " . $db->connect_error);        
        }

        $user_id = $_SESSION["user_id"];

        $q1 = "SELECT * FROM Events WHERE state='todo' and user_id='$user_id'";
        $r1 = $db->query($q1);

        $q2 = "SELECT * FROM Events WHERE state='inprogress' and user_id='$user_id'";
        $r2 = $db->query($q2);

        $q3 = "SELECT * FROM Events WHERE state='done' and user_id='$user_id'";
        $r3 = $db->query($q3);

        // function move_task($id, $position){
        //     $conn = get_connection();
        //     $sql = "UPDATE Events SET `state`=? WHERE event_id=?"; // create sql
        //     $query = $conn->prepare($sql); // prepare
        //     $query->execute([$position,$id]); // execute
        //   }

        if(isset($_GET['shift'])){
            $id = isset($_GET['eventid']) ? $_GET['eventid'] : null;
            $type = isset($_GET['type']) ? $_GET['type'] : null;
            if($id){
                $q4 = "UPDATE Events SET `state`='$type' WHERE event_id='$id'";
                $r4 = $db->query($q4);
                header("Location: ". $_SERVER['PHP_SELF']);
                exit();
            }else{
              // redirect take no action.
              header("Location: ". $_SERVER['PHP_SELF']);
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
    <title>Kanban</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body class ="grid-container">

<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

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
                <li><a class="active" href="kanban.php">Kanban</a></li>
                <li><a href="list.php">List</a></li>
                <li><a href="month-view.php">Calendar</a></li>
            </ul>
        </div>
</div>


<div class="footer">

    <p class="foot">
        <i class="fas fa-carrot"></i>
            RIKER SCHEDULING &copy 2021
    </p>

</div>



<div class="main">
        <div class="kanban-heading">
            <h2 class="kanban-heading-text">Kanban Board</h2>
        </div>
        <div class="kanban-board">
            
            <div class="kanban-block-todo" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                <strong>To Do</strong>
                <?php 
                while ($row1 = $r1->fetch_assoc()) { 
                    $baseUrl = $_SERVER["PHP_SELF"]."?shift&eventid=".$row1["event_id"]."&type="; 
                    ?>
                <div class="task" id="task1" draggable="true" ondragstart="drag(event)">
                <span class="event_title"><?=$row1["title"]?></span><br>
                    <span class="event_course_name"><?=$row1["course_name"]?> </span><br>
                    <span class="event_due">
                        <img src="icon/schedule.png" class="icon" width="20" height="20" />
                        <?=$row1["due_date"]?> |
                        <?=$row1["due_time"]?>
                    </span>
                    <br><br>
                    <span class="event_type"><?=$row1["type"]?></span><br>
                    <span>
                        <a href="<?=$baseUrl?>todo">T</a> |
                        <a href="<?=$baseUrl?>inprogress">IP</a> |
                        <a href="<?=$baseUrl?>done">D</a> |
                    </span>
                    
                </div>
                <?php } ?> 
            </div>
            <div class="kanban-block-inprogress" id="inprogress" ondrop="drop(event)" ondragover="allowDrop(event)">
                <strong>In Progress</strong>
                <?php 
                while ($row2 = $r2->fetch_assoc()) { 
                    $baseUrl = $_SERVER["PHP_SELF"]."?shift&eventid=".$row2["event_id"]."&type="; 
                    ?>
                <div class="task" id="task1" draggable="true" ondragstart="drag(event)">
                <span class="event_title"><?=$row2["title"]?></span><br>
                    <span class="event_course_name"><?=$row2["course_name"]?> </span><br>
                    <span class="event_due">
                        <img src="icon/schedule.png" class="icon" width="20" height="20" />
                        <?=$row2["due_date"]?> |
                        <?=$row2["due_time"]?>
                    </span>
                    <br><br>
                    <span class="event_type"><?=$row2["type"]?></span><br>
                    <span>
                        <a href="<?=$baseUrl?>todo">T</a> |
                        <a href="<?=$baseUrl?>inprogress">IP</a> |
                        <a href="<?=$baseUrl?>done">D</a> |
                    </span>
                    
                </div>
                <?php } ?>
            </div>
            <div class="kanban-block-done" id="done" ondrop="drop(event)" ondragover="allowDrop(event)">
                <strong>Done</strong>
                <?php 
                while ($row3 = $r3->fetch_assoc()) { 
                    $baseUrl = $_SERVER["PHP_SELF"]."?shift&eventid=".$row3["event_id"]."&type="; 
                    ?>
                <div class="task" id="task1" draggable="true" ondragstart="drag(event)">
                <span class="event_title"><?=$row3["title"]?></span><br>
                    <span class="event_course_name"><?=$row3["course_name"]?> </span><br>
                    <span class="event_due">
                        <img src="icon/schedule.png" class="icon" width="20" height="20" />
                        <?=$row3["due_date"]?> |
                        <?=$row3["due_time"]?>
                    </span>
                    <br><br>
                    <span class="event_type"><?=$row3["type"]?></span><br>
                    <span>
                        <a href="<?=$baseUrl?>todo">T</a> |
                        <a href="<?=$baseUrl?>inprogress">IP</a> |
                        <a href="<?=$baseUrl?>done">D</a> |
                    </span>
                    
                </div>
                <?php } ?>
            </div>
        </div>
</div>

<div class="left">
    
</div>
<div class="right">

</div>



</body>
</html>