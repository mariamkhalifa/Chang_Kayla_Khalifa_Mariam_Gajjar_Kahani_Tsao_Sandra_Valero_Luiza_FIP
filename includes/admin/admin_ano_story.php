<?php
    require_once '../../load.php';
    confirm_logged_in();

    $tbl = 'tbl_story';
    $getStory = getAll($tbl);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../template/head.php'; ?>
    <title>Anonymous Stories</title>
</head>
<body>
    <div class="userCMS">
        <header>
            <h1>Anonymous Stories</h1>
        <?php include '../template/header.php'; ?>
        <div class="storyList">
            <h2>Stories List:</h2>
            <?php while($row = $getStory->fetch(PDO::FETCH_ASSOC)):?>
                <h3>Story ID <?php echo $row['id'];?></h3>
                <p><?php echo $row['story'];?></p>
            <?php endwhile;?>
        </div>
        
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>