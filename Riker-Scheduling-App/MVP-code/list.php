<?php
include ("php/db.php");

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
} else {
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
    <title>Calendar</title>
</head>
<body class="grid-container">

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

    <?php
        if(isset($_GET['states'])){
            $statechecked = array();
            $statechecked = $_GET['states'];

            ?>
            
            <?php

        foreach ($statechecked as $rowstate){
                $stateid = $rowstate;
                ?> 
                <?php
                if($stateid == 1){
                    $events = "SELECT * FROM Events WHERE state = 'todo' AND user_id = '$user_id' ";
                }
                else if($stateid == 2){
                    $events = "SELECT * FROM Events WHERE state = 'inprogress' AND user_id = '$user_id' ";
                }
                else if($stateid == 3){
                    $events = "SELECT * FROM Events WHERE state = 'done' AND user_id = '$user_id' ";
                }
                $r_e = $db->query($events);
                while($row_1 = $r_e->fetch_assoc()){?>
                <div>
            <button data-toggle="collapse" data-target =".content" class="collapsible">
                <?= $row_1["title"] ?>, due on - <?= $row_1["due_date"]?>
                <?php if ($row_1["state"] == 'done') {?>
                    <span class="float-done"><?= $row_1["state"] ?></span>
                <?php } else if ($row_1["state"] == 'inprogress') {?>
                    <span class="float-inprogress"><?= $row_1["state"] ?></span>
                <?php } else if ($row_1["state"] == 'todo') {?>
                    <span class="float-todo"><?= $row_1["state"] ?></span>
                <?php }?>
            </button>
            <div class="content">
                <p>
                    <span style="font-weight: bold">Course Name:</span>  <?= $row_1["course_name"] ?> <br><br>
                    <span style="font-weight: bold">Type:</span>  <?= $row_1["type"] ?> <br><br>
                    <span style="font-weight: bold">Description:</span>  <?= $row_1["description"] ?> <br><br>
                    <span style="font-weight: bold">Time due:</span> <?= $row_1["due_time"] ?> <br>
                </p>
                <br>

            </div>
            <br>
        </div>

<?php
                }
        }

        }

        else if (isset($_GET['types'])){
            $typechecked = array();
            $typechecked = $_GET['types'];

            ?>
            
            <?php

        foreach ($typechecked as $rowstate){
                $typeid = $rowstate;
                ?> 
                
                <?php
                if($typeid == 1){
                    $events = "SELECT * FROM Events WHERE type = 'assignment' AND user_id = '$user_id' ";
                }
                else if($typeid == 2){
                    $events = "SELECT * FROM Events WHERE type = 'lab' AND user_id = '$user_id' ";
                }
                else if($typeid == 3){
                    $events = "SELECT * FROM Events WHERE type = 'exam' AND user_id = '$user_id' ";
                }
                
                $r_e = $db->query($events);
                while($row_1 = $r_e->fetch_assoc()){?>
                <div>
            <button data-toggle="collapse" data-target =".content" class="collapsible">
                <?= $row_1["title"] ?>, due on - <?= $row_1["due_date"]?>
                <?php if ($row_1["state"] == 'done') {?>
                    <span class="float-done"><?= $row_1["state"] ?></span>
                <?php } else if ($row_1["state"] == 'inprogress') {?>
                    <span class="float-inprogress"><?= $row_1["state"] ?></span>
                <?php } else if ($row_1["state"] == 'todo') {?>
                    <span class="float-todo"><?= $row_1["state"] ?></span>
                <?php }?>
            </button>
            <div class="content">
                <p>
                    <span style="font-weight: bold">Course Name:</span>  <?= $row_1["course_name"] ?> <br><br>
                    <span style="font-weight: bold">Type:</span>  <?= $row_1["type"] ?> <br><br>
                    <span style="font-weight: bold">Description:</span>  <?= $row_1["description"] ?> <br><br>
                    <span style="font-weight: bold">Time due:</span> <?= $row_1["due_time"] ?> <br>
                </p>
                <br>

            </div>
            <br>
        </div>

<?php
                }
        }

        }

        else{
    
    ?>

    <?php while($row = $r1->fetch_assoc()) { ?>
        <div>
            <button data-toggle="collapse" data-target =".content" class="collapsible">
                <?= $row["title"] ?>, due on - <?= $row["due_date"]?>
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
    <?php }
        }
        
    ?>
</div>

<div class="left filter-box">
    <h4 class="filter-heading"> Filter by State: </h4>
    <form action=""  method="GET">
    <?php                    
         $brand_query = "SELECT * FROM State";
         $r_q = $db -> query($brand_query);
                                
         while($_row = $r_q -> fetch_assoc())
             {    
                $checked = array();
                if(isset($_GET['states']))
                {
                    $checked = $_GET['states'];
                }
    ?>
        <div>
             <input type="checkbox" name="states[]" value="<?= $_row['state_id'] ?>"  >
             <span><?= $_row['name'] ?><span>
             </div>
         <?php
             }
                               
          ?>
          <br><input type="submit" style="width: 60%" value="Filter">
    </form>
   
    <h4 class = "filter-heading"> Filter by Type: </h4>
    <form action=""  method="GET">
    <?php                    
         $type_query = "SELECT * FROM Type";
         $r_q = $db -> query($type_query);
                                
         while($_row = $r_q -> fetch_assoc())
             {    
                $checked = array();
                if(isset($_GET['types']))
                {
                    $checked = $_GET['types'];
                }
    ?>
        <div>
             <input type="checkbox" name="types[]" value="<?= $_row['type_id'] ?>"  >
             <span><?= $_row['name'] ?><span>
             </div>
         <?php
             }
                               
          ?>
          <br><input type="submit" style="width: 60%" value="Filter">
    </form>


</div>
<div class="right">

</div>


<script type="text/javascript" src="js/list.js"> </script>
</body>
</html>
