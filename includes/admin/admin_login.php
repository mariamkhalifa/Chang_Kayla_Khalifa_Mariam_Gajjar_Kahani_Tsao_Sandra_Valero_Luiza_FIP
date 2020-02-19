<?php

    require_once '../load.php';
    require_once ADMIN_SCRIPT_PATH.'/login.php';
    $ip = $_SERVER['REMOTE_ADDR'];
    $reqtime = date("Y-m-d H:i:s");
    session_start();

    if(isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if(!empty($username) && !empty($password)) {
            //do the login
            $message = login($username, $password, $ip, $reqtime);
        }else{
            $message = 'Please fill out the required feilds';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../head.php'; ?>
    <title>Login Page</title>
</head>
<body>
    <div class="forms">
        <?php echo !empty($message)?$message: ''; ?>
        <form action="admin_login.php" method="post">
            <div class="row">
                <label>Username:</label>
                <input type="text" name="username" value="">
            </div>
            <div class="row">
                <label>Password:</label>
                <input type="password" name="password" value="">
            </div>
            <button name="submit">Login</button>
        </form>
        <p class="static">Don't have an account yet?<a href="admin_signup.php">Sign up</a></p>
    </div>
</body>
</html>