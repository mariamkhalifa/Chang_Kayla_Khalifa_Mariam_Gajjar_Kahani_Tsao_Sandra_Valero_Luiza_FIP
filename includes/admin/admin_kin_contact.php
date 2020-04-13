<?php
    require_once '../../load.php';
    confirm_logged_in();

    $tbl = 'tbl_event';
    $getEvent = getAll($tbl);

    if(!empty($_GET['createdE'])){
        $msg = $_GET['createdE'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['deletedE'])) {
        $msg = $_GET['deletedE'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } 

    if(isset($_POST['submit-head'])) {
        $heading = trim($_POST['heading']);
        $text = trim($_POST['text']);
        $message = updateComH($heading, $text);
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
            
        </section>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>