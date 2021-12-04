<?php 

  session_start(); 
  if(!isset($_SESSION["username"])) {
      header("Location: index.php");
      exit();
  } else {
        include ("php/db.php");
        $db = new mysqli($server, $username, $dbpassword, $dbname);
        if ($db->connect_error) {
            die ("Connection failed: " . $db->connect_error);        
        }

        $user_id = $_SESSION["user_id"];

        $q1 = "SELECT * FROM Events WHERE user_id='$user_id' ORDER BY due_date, due_time";
        $r1 = $db->query($q1);
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='fullcalendar-5/lib/main.css' rel='stylesheet' />
<link rel="stylesheet" href="style.css">
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<script src='fullcalendar-5/lib/main.js'></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: "<?php echo date("Y-m-d"); ?>",
      editable: true,
      selectable: true,
      businessHours: true,
      dayMaxEvents: true, // allow "more" link when too many events
      headerToolbar: { center: 'dayGridMonth,timeGridWeek' }, // buttons for switching between views
      displayEventTime: false,
      events: [
        <?php 
            while ($row1 = $r1->fetch_assoc()) { ?> 
        {
          title: "<?=$row1["course_name"]?> - <?=$row1["title"]?>",
          start: "<?=$row1["due_date"]?>T<?=$row1["due_time"]?>",
          backgroundColor: "<?php if($row1["state"] == 'todo'){echo('rgba(255, 0, 0)');} else if($row1["state"] == 'inprogress'){echo('rgba(204, 150, 0)');}else if($row1["state"] == 'done'){echo('rgba(0, 128, 0)');}?>",
          borderColor: "<?php if($row1["state"] == 'todo'){echo('rgba(255, 0, 0)');} else if($row1["state"] == 'inprogress'){echo('rgba(204, 150, 0)');}else if($row1["state"] == 'done'){echo('rgba(0, 128, 0)');}?>",
          url: "event.php?id=<?=$row1["event_id"]?>",
          interactive: true
        },
        <?php } ?> 
      ]
    });

    calendar.render();
  });
</script>
<style>

  body {
    /* margin: 40px 10px; */
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>
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
                <li><a href="kanban.php">Kanban</a></li>
                <li><a class="active" href="calendar.php">Calendar</a></li>
                <li><a href="list.php">List</a></li>
            </ul>
        </div>
</div>

<div class="main">
  <br>

  <div id='calendar'>
  
  </div>

</div>

<div class="footer">

<p class="foot">
    <i class="fas fa-carrot"></i>
        RIKER SCHEDULING &copy 2021
</p>

</div>

</body>
</html>
