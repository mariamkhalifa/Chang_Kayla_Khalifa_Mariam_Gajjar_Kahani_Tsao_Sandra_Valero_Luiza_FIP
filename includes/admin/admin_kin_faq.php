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
    <title>Edit FAQ Page</title>
</head>
<body>
    <div class="userCMS">
        <header>
            <h1>Subscriptions</h1>
        <?php include '../template/header.php'; ?>
        <a href="index.php"><-Back to Dashboard</a>
        <section id="faq">
            
        </section>
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