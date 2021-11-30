<?php
    include ("db.php");
    $db = new mysqli($server, $username, $dbpassword, $dbname);
    if ($db->connect_error) {
        die ("Connection failed: " . $db->connect_error);        
    }

    $user_id = $_SESSION["user_id"];

    $q1 = "SELECT * FROM Events WHERE state='todo' and user_id='$user_id' ORDER BY due_date, due_time";
    $r1 = $db->query($q1);

    $q2 = "SELECT * FROM Events WHERE state='inprogress' and user_id='$user_id' ORDER BY due_date, due_time";
    $r2 = $db->query($q2);

    $q3 = "SELECT * FROM Events WHERE state='done' and user_id='$user_id' ORDER BY due_date, due_time";
    $r3 = $db->query($q3);

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
?>