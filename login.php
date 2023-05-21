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
    <form class="login-body" action="login.php" method="post">
        <p class="title">Student Login Gateway</p>
        <div class="login-form">
        <p class="subtitle">Enter your Email and Password</p>
        <input type="email" name="email" class="input semail" placeholder="email@example.com">
        <input type="password" name="password" class="input spass" placeholder="Password">
        <button type="submit" name="login" class="btn login">Login</button>
        <p class="text lostpass">Don't have account? <a href="signup.php">Sign Up</a></p>
        </div>
        <p class="text desc">Please be aware that this is just an academic portal for studying purposes only! for security purposes, any data shown in your demo should not represent any real life data. </p>
    </form>

    <?php 
        session_start();
        if(isset($_POST['login'])){
            extract($_POST);
            include_once("config.php");
            $result=mysqli_query($mysqli, "SELECT * FROM student where semail='$email' and spassword=$password");
            $row = mysqli_fetch_array($result);
            if(is_array($row)){
                $_SESSION["sid"] = $row['sid'];
                $_SESSION["sname"] = $row['sname'];
                $_SESSION["semail"] = $row['semail'];
                $_SESSION["smajor"] = $row['smajor'];
                //header("Location: index.php");
                echo "success";
            }
            else{
                echo "failed";
            }
        }
    ?>
</div>
</body>
</html>