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
    <h2 class="logo">RSA</h2>
    <span class="float-right">Log Out</span>
    <div>
        <ul>
            <li><a href="create-event.php">Create Event</a></li>
            <li><a href="kanban.php">Kanban</a></li>
            <li><a class="active" href="calendar.php">Calendar</a></li>
        </ul>
    </div>
</div>
<div class="main">
<div id="calendar-view" class="calendar-view">
    <style>
        table{
            table-layout: fixed;
        }
    </style>
    <table border="1" width="1250" height="800">
        <tr>
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thur</th>
            <th>Fri</th>
            <th>Sat</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <table>
                    <tr>
                        <td>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="">CS Assignment</a><br>
                        </td>
                    </tr>
                </table>
            </td>
            <td>2</td>
        </tr>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
        <td>9</td>
        </tr>
        </tr>
        <td>10</td>
        <td>11</td>
        <td>
            <table>
                <tr>
                    <td>12</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a href="">ENSE Assignment</a><br>
                    </td>
                </tr>
            </table>

        </td>
        <td>13</td>
        <td>14</td>
        <td>15</td>
        <td>16</td>
        </tr>
        </tr>
        <td>17</td>
        <td>18</td>
        <td>19</td>
        <td>20</td>
        <td>21</td>
        <td>22</td>
        <td>23</td>
        </tr>
        </tr>
        <td>24</td>
        <td>25</td>
        <td>26</td>
        <td>27</td>
        <td>18</td>
        <td>29</td>
        <td>30</td>
        </tr>
        </tr>
        <td>31</td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        </tr>
    </table>
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
</body>
</html>