<?php

    require_once '../load.php';
    require_once ADMIN_SCRIPT_PATH.'/read.php';
    $tbl = 'tbl_user';
    $getUsers = getAll($tbl);
    $message = greeting();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../head.php'; ?>
    <title>Dashboard</title>
</head>
<body>
    <header>
        <h1>Welcome to DASHBOARD!</h1>
        <a href="../index.php">Log Out</a>
    </header>
    <main id="dashP">
        <?php echo !empty($message)?$message: ''; ?>
        <?php while($row = $getUsers->fetch(PDO::FETCH_ASSOC)):?>
        <div class="users-list">
            <h3><?php echo $row['user_name'];?></h3>
            <h4>Last Logged In Time</h4>
            <p><?php echo $row['user_lastlogin'];?></p>
            <h4>IP Address</h4>
            <p><?php echo $row['user_ip'];?></p>
        </div>
        <?php endwhile;?>
    </main>
</body>
</html>