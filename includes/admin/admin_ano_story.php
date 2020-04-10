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
        <p class="bk"><a href="index.php"><-Back to Dashboard</a></p>
        <div id="story">
            <h2>Stories List:</h2>
            <div class="storyList">
                <div class="stories">
                    <?php while($row = $getStory->fetch(PDO::FETCH_ASSOC)):?>
                        <h3>Story ID <?php echo $row['id'];?></h3>
                        <p><?php echo $row['story'];?></p>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
        
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>