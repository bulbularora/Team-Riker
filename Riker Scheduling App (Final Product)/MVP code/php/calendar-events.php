<?php
    include ("db.php");
    $db = new mysqli($server, $username, $dbpassword, $dbname);
    if ($db->connect_error) {
        die ("Connection failed: " . $db->connect_error);        
    }

    $user_id = $_SESSION["user_id"];

    $q1 = "SELECT * FROM Events WHERE user_id='$user_id' ORDER BY due_date, due_time ";
    $r1 = $db->query($q1);
?>