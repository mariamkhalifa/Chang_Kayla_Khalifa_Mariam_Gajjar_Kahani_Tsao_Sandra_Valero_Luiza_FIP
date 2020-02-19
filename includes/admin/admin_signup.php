<?php

    require_once '../load.php';
    require_once ADMIN_SCRIPT_PATH.'/signup.php';
    $ip = $_SERVER['REMOTE_ADDR'];
    $reqtime = date("Y-m-d H:i:s");

    if(isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        if(!empty($username) && !empty($password)) {
            //do the login
            $message = signup($username, $password, $ip, $reqtime);
        }else{
            $message = 'Please fill out the required feilds';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <?php include '../head.php'; ?>
    <title>Sign Up Page</title>
</head>
<body>
    <div class="forms">
        <?php echo !empty($message)?$message: ''; ?>
        <form action="admin_signup.php" method="post">
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
        <p class="static">Have an account already?<a href="admin_login.php">Login</a></p>
    </div>
</body>
</html>