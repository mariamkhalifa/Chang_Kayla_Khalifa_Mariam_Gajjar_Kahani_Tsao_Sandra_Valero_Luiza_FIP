<?php
    require_once '../../load.php';
    confirm_logged_in();

    $tbl = 'tbl_contactintro';
    $getContact = getAll($tbl);
    $tblSM = 'tbl_socialmedia';
    $getSM = getAll($tblSM);
    $tblInfo = 'tbl_contactinfo';
    $getInfo = getAll($tblInfo);

    if(!empty($_GET['updatedConH'])){
        $msg = $_GET['updatedConH'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedConSM'])) {
        $msg = $_GET['updatedConSM'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedConInfo'])) {
        $msg = $_GET['updatedConInfo'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } 
    
    if(isset($_POST['submit-head'])) {
        $heading = trim($_POST['heading']);
        $text = trim($_POST['text']);
        $message = updateContactH($heading, $text);
    }

    if(isset($_POST['submit-sm'])) {
        $heading = trim($_POST['heading']);
        $intro = trim($_POST['intro']);
        $text = trim($_POST['text']);
        $message = updateSM($heading, $intro, $text);
    }

    if(isset($_POST['submit-info'])) {
        $address = trim($_POST['address']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $message = updateInfo($address, $phone, $email);
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../template/head.php'; ?>
    <title>Edit Contact Page</title>
</head>
<body>
    <div class="userCMS">
        <header>
            <h1>Edit Contact Page</h1>
        <?php include '../template/header.php'; ?>
        <p class="bk"><a href="index.php"><-Back to Dashboard</a></p>
        <?php echo !empty($message)?$message: ''; ?>
        <section id="contact">
            <h2>Contact and Social Media:</h2>
            <div class="col">
                <h3>Heading:</h3>
                <form action="admin_kin_contact.php" method="post" class="textForm">
                <?php while($row = $getContact->fetch(PDO::FETCH_ASSOC)):?>
                    <input type="text" name="heading" value="<?php echo $row['heading'];?>">
                    <textarea name="text"><?php echo $row['text'];?></textarea>
                    <input type="submit" name="submit-head" value="Save">
                <?php endwhile;?>
                </form>
            </div>
            <div class="col">
                <h3>Social Media Heading:</h3>
                <form action="admin_kin_contact.php" method="post" class="textForm">
                <?php while($row = $getSM->fetch(PDO::FETCH_ASSOC)):?>
                    <input type="text" name="heading" value="<?php echo $row['heading'];?>">
                    <input type="text" name="intro" value="<?php echo $row['intro'];?>">
                    <textarea name="text"><?php echo $row['text'];?></textarea>
                    <input type="submit" name="submit-sm" value="Save">
                <?php endwhile;?>
                </form>
            </div>
            <div class="col">
                <h3>Contact Info:</h3>
                <form action="admin_kin_contact.php" method="post" class="textForm">
                <?php while($row = $getInfo->fetch(PDO::FETCH_ASSOC)):?>
                    <input type="text" name="address" value="<?php echo $row['address'];?>">
                    <input type="text" name="phone" value="<?php echo $row['phone'];?>">
                    <input type="email" name="email" value="<?php echo $row['email'];?>">
                    <input type="submit" name="submit-info" value="Save">
                <?php endwhile;?>
                </form>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>