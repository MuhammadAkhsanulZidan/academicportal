<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <input type="text" name="major" class="input major" placeholder="major">
            <input type="password" name="password" class="input spass" placeholder="Password">
            <button type="submit" name="signup" class="btn login">Sign Up</button>
        </form>
    </div>
    </div>
</body>
    <?php
        if(isset($_POST['signup'])){
            $name = strtoupper($_POST['name']);
            $email = $_POST['email'];
            $id = $_POST['id'];
            $major = strtoupper($_POST['major']);
            $password = $_POST['password'];

            include_once("config.php");
            mysqli_query($mysqli, "INSERT INTO student(sid, sname, semail, smajor,spassword) VALUES($id, '$name', '$email', '$major', '$password')");            
            header('Location: index.php');
        }
    ?>

</html>