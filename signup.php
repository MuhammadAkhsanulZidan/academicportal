<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-body">
        <p class="title">Student Sign Up Gateway</p>
        <form action="signup.php" method="post" class="login-form">
            <p class="subtitle">Enter your Name, Email, and Password!</p>
            <input type="text" name="name" class="input sname" placeholder="Name">
            <input type="text" name="email" class="input semail" placeholder="email@example.com">
            <input type="number" name="id" class="input sid" placeholder="student id">
            <select name="major" class="input">
                <option value="none">- Select Your Major -</option>
                <option value="MECHANICAL ENGINEERING">MECHANICAL ENGINEERING</option>
                <option value="INDUSTRIAL ENGINEERING">INDUSTRIAL ENGINEERING</option>
                <option value="COMPUTER SCIENCE">COMPUTER SCIENCE</option>
                <option value="INFORMATION SYSTEM">INFORMATION SYSTEM</option>
                <option value="MANAGEMENT">MANAGEMENT</option>
                <option value="ACCOUNTING">ACCOUNTING</option>
                <option value="ENGLISH EDUCATION">ENGLISH EDUCATION</option>
                <option value="MATH EDUCATION">MATH EDUCATION</option>
            </select>
            <input type="password" name="password" class="input spass" placeholder="Password">
            <button type="submit" name="signup" class="btn login">Sign Up</button>
            <p class="text lostpass">Already have account? <a href="login.php">Log in</a></p>
        </form>
    </div>
    </div>
</body>
    <?php
        if(isset($_POST['signup'])){
            $name = strtoupper($_POST['name']);
            $email = $_POST['email'];
            $id = $_POST['id'];
            $major = $_POST['major'];
            $password = $_POST['password'];
            include_once("config.php");
            mysqli_query($mysqli, "INSERT INTO student(sid, sname, semail, smajor,spassword) VALUES($id, '$name', '$email', '$major', '$password')");            
            header('Location: login.php?status=success');
        }
    ?>

</html>