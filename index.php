<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="index.css">
    <script src="menu.js"></script>
</head>

<body>
    <?php
    session_start();
    include 'config.php';
    $sid = $_SESSION["sid"];
    $sql = mysqli_query($mysqli, "SELECT sname, semail, sid, smajor from student where sid=$sid");
    $user_courses = mysqli_query($mysqli, "SELECT * FROM courses c inner join enrolled_course e where c.course_id=e.course_id and e.student_id=$sid");
    ?>
    <header>
        <h2>Academic Portal</h2>
        <div class="toggle">
        <button class="btn-toggle" id="toggleButton" onclick="toggleMenu()">=</button>
        <div class="menu" id="menu" style="display: none">
            <?php echo $_SESSION["sname"] ?><br>
            <?php echo $_SESSION["semail"] ?><br>
            <a href="login.php">Log Out</a>
        </div>
        </div>

    </header>
    <div class="container">
        <table style="text-align: left" border="0">
            <colgroup>
                <col style="width: 25%;">
                <col style="width: 25%;">
            </colgroup>
            <tr>
                <th>Name</th>
                <th>: <?php echo $_SESSION["sname"] ?></th>
            </tr>
            <tr>
                <th> Student Number</th>
                <th>: <?php echo $_SESSION["sid"] ?></th>
            </tr>
            <tr>
                <th>Major </th>
                <th>: <?php echo $_SESSION["smajor"] ?></th>
            </tr>
        </table>
        <p>Here is your currently enrolled course: </p>
        <table width='80%' border="1">
            <tr class="column_name">
                <th>CODE</th>
                <th>COURSE</th>
                <th>CREDIT</th>
            </tr>
            <?php
            $totcredit=0;
            while ($user_course = mysqli_fetch_array($user_courses)) {
                echo "<tr>";
                echo "<td>" . $user_course['COURSE_ID'] . "</td>";
                echo "<td>" . $user_course['NAME'] . "</td>";
                echo "<td style='text-align: center'>" . $user_course['CREDIT'] . "</td>";
                $totcredit += $user_course['CREDIT'];
            }
            ?>
        </table>
        <p><?php echo "Total Credit : ".$totcredit ?></p><br>
        <a href="addcourse.php">UPDATE COURSE</a>
    </div>
</body>

</html>