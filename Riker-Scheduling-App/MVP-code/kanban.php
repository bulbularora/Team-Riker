<?php 
    session_start(); 
    if(!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    } else {
        include ("php/kanban-events.php");
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
                <li><a class="active" href="kanban.php">Kanban</a></li>
                <li><a href="calendar.php">Calendar</a></li>
                <li><a href="list.php">List</a></li>
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
            
            <div class="kanban-block-todo" id="todo" >
                <strong>To Do</strong>
                <?php 
                while ($row1 = $r1->fetch_assoc()) { 
                    $baseUrl = $_SERVER["PHP_SELF"]."?shift&eventid=".$row1["event_id"]."&type="; 
                    ?>
                <div class="task" id="task1" draggable="true" ondragstart="drag(event)">
                    <span class="event_title"><?=$row1["title"]?></span><br>
                    <span class="event_course_name"><?=$row1["course_name"]?> </span>
                    <span class="event_type"><?=$row1["type"]?></span><br>
                    <span class="event_due">
                        <img src="icon/schedule.png" class="icon" width="20" height="20" />
                        <?=$row1["due_date"]?> |
                        <?=$row1["due_time"]?>
                    </span>
                    <br><br>
                    <span>
                        <a style="color: rgba(255, 0, 0)" href="<?=$baseUrl?>todo">T</a> |
                        <a style="color: rgba(204, 150, 0)" href="<?=$baseUrl?>inprogress">IP</a> |
                        <a style="color: rgba(0, 128, 0)" href="<?=$baseUrl?>done">D</a> |
                        <a class="edit-button" href="event.php?id=<?=$row1["event_id"]?>">Edit</a>
                    </span>
                    
                </div>
                <?php } ?> 
            </div>
            <div class="kanban-block-inprogress" id="inprogress" >
                <strong>In Progress</strong>
                <?php 
                while ($row2 = $r2->fetch_assoc()) { 
                    $baseUrl = $_SERVER["PHP_SELF"]."?shift&eventid=".$row2["event_id"]."&type="; 
                    ?>
                <div class="task" id="task1" draggable="true" ondragstart="drag(event)">
                    <span class="event_title"><?=$row2["title"]?></span><br>
                    <span class="event_course_name"><?=$row2["course_name"]?> </span>
                    <span class="event_type"><?=$row2["type"]?></span><br>
                    <span class="event_due">
                        <img src="icon/schedule.png" class="icon" width="20" height="20" />
                        <?=$row2["due_date"]?> |
                        <?=$row2["due_time"]?>
                    </span>
                    <br><br>
                    <span>
                        <a style="color: rgba(255, 0, 0)" href="<?=$baseUrl?>todo">T</a> |
                        <a style="color: rgba(204, 150, 0)" href="<?=$baseUrl?>inprogress">IP</a> |
                        <a style="color: rgba(0, 128, 0)" href="<?=$baseUrl?>done">D</a> |
                        <a class="edit-button" href="event.php?id=<?=$row2["event_id"]?>">Edit</a>
                    </span>
                    
                </div>
                <?php } ?>
            </div>
            <div class="kanban-block-done" id="done" >
                <strong>Done</strong>
                <?php 
                while ($row3 = $r3->fetch_assoc()) { 
                    $baseUrl = $_SERVER["PHP_SELF"]."?shift&eventid=".$row3["event_id"]."&type="; 
                    ?>
                <div class="task" id="task1" draggable="true" ondragstart="drag(event)">
                    <span class="event_title"><?=$row3["title"]?></span><br>
                    <span class="event_course_name"><?=$row3["course_name"]?> </span>
                    <span class="event_type"><?=$row3["type"]?></span><br>
                    <span class="event_due">
                        <img src="icon/schedule.png" class="icon" width="20" height="20" />
                        <?=$row3["due_date"]?> |
                        <?=$row3["due_time"]?>
                    </span>
                    <br><br>
                    <span>
                        <a style="color: rgba(255, 0, 0)" href="<?=$baseUrl?>todo">T</a> |
                        <a style="color: rgba(204, 150, 0)" href="<?=$baseUrl?>inprogress">IP</a> |
                        <a style="color: rgba(0, 128, 0)" href="<?=$baseUrl?>done">D</a> |
                        <a class="edit-button" href="event.php?id=<?=$row3["event_id"]?>">Edit</a>
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