<?php
    require_once '../../load.php';
    confirm_logged_in();

    $tbl = 'tbl_subscription';
    $getSub = getAll($tbl);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../template/head.php'; ?>
    <title>Subscriptions</title>
</head>
<body>
    <div class="userCMS">
        <header>
            <h1>Subscriptions</h1>
        <?php include '../template/header.php'; ?>
        <p>Check out <a href="https://mailchimp.com/" target="_blank">Mailchimp.com</a> for mass email products.</p>
        <div class="subList">
            <h2>Email List:</h2>
        <?php while($row = $getSub->fetch(PDO::FETCH_ASSOC)):?>
            <p><?php echo $row['sub_email'];?></p>
        <?php endwhile;?>
        </div>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>