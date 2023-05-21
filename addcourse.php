<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
    <link rel="stylesheet" href="index.css">
    <script src="menu.js"></script>
</head>

<body>
    <?php
    session_start();
    include('config.php');
    $sid = $_SESSION["sid"];
    $courselist = mysqli_query($mysqli, "SELECT * FROM courses");
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
    </header>
    <form class="container" action="addcourse.php" method="post">
        <p>Add your course(s) here: </p>
        <table width='90%' border="1">
            <tr class="column_name">
                <th>CODE</th>
                <th>COURSE</th>
                <th>CREDIT</th>
                <th>ADD/REMOVE</th>
            </tr>
            <?php
            while ($course = mysqli_fetch_array($courselist)) {
                echo "<tr>";
                echo "<td name='id'>" . $course['COURSE_ID'] . "</td>";
                echo "<td name='name'>" . $course['NAME'] . "</td>";
                echo "<td name='credit'>" . $course['CREDIT'] . "</td>";
                if (($mysqli->query("SELECT COURSE_ID FROM enrolled_course WHERE COURSE_ID='" . $course['COURSE_ID'] . "' AND STUDENT_ID=".$sid))->num_rows > 0) {
                    echo "<td style='text-align: center'><input type=checkbox name='checkboxs[]' checked value='" . $course['COURSE_ID'] . "'></td>";
                } else {
                    echo "<td style='text-align: center'><input type=checkbox name='checkboxs[]' unchecked value='" . $course['COURSE_ID'] . "'></td>";
                }
                echo "</tr>";
            }

            ?>
        </table>
        <button type="submit" name="update" class="btn update">UPDATE</button>
        <a href="index.php">CANCEL</a>
    </form>
</body>
<?php
if (isset($_POST['update'])) {
    mysqli_query($mysqli, "DELETE FROM enrolled_course WHERE STUDENT_ID=".$sid);
    if (!empty($_POST['checkboxs'])) {
        $checkeds = $_POST['checkboxs'];
        foreach ($checkeds as $cid) {
            mysqli_query($mysqli, "INSERT INTO enrolled_course(STUDENT_ID, COURSE_ID) VALUES($sid, '$cid')");
        }
    }
    header('Location: index.php');
}
?>

</html>