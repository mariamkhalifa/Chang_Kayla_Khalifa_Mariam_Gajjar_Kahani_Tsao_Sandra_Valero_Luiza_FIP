<?php

    require_once '../../load.php';
    confirm_logged_in();
    
    $message = greeting();

    if(!empty($_GET['create'])){
        $msg = $_GET['create'];
        $create = '<p class="actions">'.$msg.'</p>';
    }
    if(!empty($_GET['edit'])){
        $msg = $_GET['edit'];
        $edit = '<p class="actions">'.$msg.'</p>';
    }
    if(!empty($_GET['set'])){
        $msg = $_GET['set'];
        $set = '<p class="actions">'.$msg.'</p>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../template/head.php'; ?>
    <title>Dashboard</title>
</head>
<body>
    <div class="userCMS">
        <header>
            <h1>Welcome to DASHBOARD!</h1>
        <?php include '../template/header.php'; ?>
        <div id="main">
            <h3><?php echo !empty($message)?$message: ''; ?>, <?php echo $_SESSION['user_fname']; ?>!</h3>
            <div class="subNav">
                <a href="admin_subscription.php">Subscriptions List</a>
                <a href="admin_ano_story.php">Anonymous Stories</a>
            </div>
            <div class="pageList">
                <a href="admin_kin_home.php">Edit Home Page</a>
                <a href="admin_kin_community.php">Edit Community Page</a>
                <a href="admin_kin_faq.php">Edit FAQ Page</a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>