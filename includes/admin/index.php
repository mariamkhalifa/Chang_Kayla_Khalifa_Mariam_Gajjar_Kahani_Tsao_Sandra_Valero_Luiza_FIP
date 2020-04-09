<?php

    require_once '../../load.php';
    confirm_logged_in();
    
    $message = greeting();
    $tblAbout = 'tbl_about';
    $getAbout = getAll($tblAbout);
    $tblEvent = 'tbl_event';
    $getOneEvent = getOneEvent($tblEvent);
    
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
                <div class="pgImg">
                <?php while($row = $getAbout->fetch(PDO::FETCH_ASSOC)):?>
                    <img src="../../images/<?php echo $row['img'];?>" alt="<?php echo $row['img'];?>">
                    <a href="admin_kin_home.php">Edit Home Page</a>
                <?php endwhile;?>
                </div>
                <div class="pgImg">
                <?php while($row = $getOneEvent->fetch(PDO::FETCH_ASSOC)):?>
                    <img src="../../images/<?php echo $row['img'];?>" alt="<?php echo $row['img'];?>">
                    <a href="admin_kin_community.php">Edit Community Page</a>
                <?php endwhile;?>
                </div>
                <div class="pgImg">
                    <img src="../../images/kin_symbol.svg" alt="keep it neutral logo">
                    <a href="admin_kin_faq.php">Edit FAQ Page</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>