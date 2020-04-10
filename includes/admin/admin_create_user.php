<?php

    require_once '../../load.php';
    confirm_logged_in();
    
    $ip = $_SERVER['REMOTE_ADDR'];
    $reqtime = date("Y-m-d H:i:s");

    if(isset($_POST['submit'])){
        $fname = trim($_POST['fname']);
        $username = trim($_POST['username']);
        // $password = trim($_POST['password']);
        $email = str_replace(array("\r", "\n", "%0a", "%0d"),'',$_POST['email']);
        $email = filter_var($email,FILTER_VALIDATE_EMAIL);

        if(empty($fname) || empty($username) || empty($email)) {
            $message = 'Please fill the required fields';
        } else {
            // data pre process, and good to go
            $message = createUser($fname, $username, $email, $ip, $reqtime);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <?php include '../template/head.php'; ?>
    <title>Create Account</title>
</head>
<body>
    <div class="userCMS">
        <div class="userForms">
            <?php echo !empty($message)?$message: ''; ?>
            <form action="admin_create_user.php" method="post">
                <h2>Create Account</h2><p><a href="admin_user_page.php">Go Back</a></p>
                <div class="row">
                    <label>First Name:</label>
                    <input type="text" name="fname" value="">
                </div>
                <div class="row">
                    <label>Username:</label>
                    <input type="text" name="username" value="">
                </div>
                <!-- <div class="row">
                    <label>Password:</label>
                    <input type="password" name="password" value="">
                </div> -->
                <div class="row">
                    <label>Email:</label>
                    <input type="email" name="email" value="">
                </div>
                <button name="submit" id="ca">Create Account</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>