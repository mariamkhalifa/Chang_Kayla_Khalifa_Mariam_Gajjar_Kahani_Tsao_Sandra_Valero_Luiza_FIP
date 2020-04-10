<?php
    require_once '../../load.php';
    confirm_logged_in();

    $tblHero = 'tbl_hero';
    $getHero = getAll($tblHero);
    $getHeroT = getAll($tblHero);
    $tblHeroAlt = 'tbl_hero_alt';
    $getHeroAlt = getAll($tblHeroAlt);
    $getHeroAltT = getAll($tblHeroAlt);
    $tblAbout = 'tbl_about';
    $getAbout = getAll($tblAbout);
    $getAboutT = getAll($tblAbout);
    $tblVideo = 'tbl_video';
    $getVideo = getAll($tblVideo);
    $getVideoT = getAll($tblVideo);
    $tblTest = 'tbl_test_location';
    $getTest = getAll($tblTest);

    if(!empty($_GET['updatedHero'])){
        $msg = $_GET['updatedHero'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedAbout'])) {
        $msg = $_GET['updatedAbout'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedVid'])) {
        $msg = $_GET['updatedVid'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedVidT'])) {
        $msg = $_GET['updatedVidT'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['addTest'])) {
        $msg = $_GET['addTest'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['deletedT'])) {
        $msg = $_GET['deletedT'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    }

    if(isset($_POST['submit-hero'])) {
        $tbl = trim($_POST['tbl']);
        $id = trim($_POST['id']);
        $text = trim($_POST['hText']);
        $cap_text = trim($_POST['hCText']);
        $message = updateHero($tbl, $id, $text, $cap_text);
    }

    if(isset($_POST['submit-about'])) {
        $heading = trim($_POST['heading']);
        $p = trim($_POST['p']);
        $p_sub = trim($_POST['p_sub']);
        $message = updateAbout($heading, $p, $p_sub);
    }

    if(isset($_POST['submit-video'])) {
        if($_FILES['video']['size'] > 0 && $_FILES['video']['error'] == 0){
            $video = $_FILES['video'];
            $old_vid = trim($_POST['old_vid']);
            $message = updateVideo($video, $old_vid);
        } else {
            return 'Please upload video first!';
        }
    }

    if(isset($_POST['submit-vid-text'])) {
        $heading = trim($_POST['heading']);
        $p = trim($_POST['p']);
        $message = updateVidT($heading, $p);
    }

    if(isset($_POST['submit-test-new'])) {
        $name = trim($_POST['name']);
        $address = trim($_POST['address']);
        $message = addTestLocation($name, $address);
    }

    if(isset($_POST['submit-test'])) {
        $id = trim($_POST['id']);
        $name = trim($_POST['name']);
        $address = trim($_POST['address']);
        $message = updateTestLocation($id, $name, $address);
    }

    if(isset($_POST['delete-test'])) {
        $id = trim($_POST['id']);
        $message = deleteTestLocation($id);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../template/head.php'; ?>
    <title>Edit Home Page</title>
</head>
<body>
    <div class="userCMS">
        <header>
            <h1>Edit Home Page</h1>
        <?php include '../template/header.php'; ?>
        <p class="bk"><a href="index.php"><-Back to Dashboard</a></p>
        <div class="homeNav">
            <a href="admin_kin_home.php?#hero">Hero Section</a>
            <a href="admin_kin_home.php?#about">About Section</a>
            <a href="admin_kin_home.php?#video">Video Section</a>
            <a href="admin_kin_home.php?#test">Test Section</a>
        </div>
        <?php echo !empty($message)?$message: ''; ?>
        <section id="hero">
            <h2>Hero Section:</h2>
            <div class="col">
                <h3>Images:</h3>
                <div class="imgRow">
                    <?php while($row = $getHero->fetch(PDO::FETCH_ASSOC)):?>
                    <div class="imgs">
                        <img src="../../images/<?php echo $row['img'];?>" alt=" hero image <?php echo $row['img'];?>">
                        <a href="admin_kin_image.php?img_id=<?php echo $row['id'];?>&tbl=tbl_hero&page=admin_kin_home.php">Edit</a>
                    </div>
                    <?php endwhile;?>
                    <?php while($row = $getHeroAlt->fetch(PDO::FETCH_ASSOC)):?>
                    <div class="imgs">
                        <img src="../../images/<?php echo $row['img'];?>" alt=" hero image <?php echo $row['img'];?>">
                        <a href="admin_kin_image.php?img_id=<?php echo $row['id'];?>&tbl=tbl_hero_alt&page=admin_kin_home.php">Edit</a>
                    </div>
                    <?php endwhile;?>
                </div>
            </div>
            <div class="col">
                <h3>Texts:</h3>
                <div class="rows">
                    <div class="row">
                        <?php while($row = $getHeroT->fetch(PDO::FETCH_ASSOC)):?>
                        <form action="admin_kin_home.php" method="post" class="textForm">
                            <input class="hidden" type="text" name="tbl" value="tbl_hero">
                            <input class="hidden" type="number" name="id" value="<?php echo $row['id'];?>">
                            <input type="text" name="hText" value="<?php echo $row['text'];?>">
                            <input type="text" name="hCText" value="<?php echo $row['cap_text'];?>">
                            <input type="submit" name="submit-hero" value="Save">
                        </form>
                        <?php endwhile;?>
                    </div>
                    <div class="row">
                        <?php while($row = $getHeroAltT->fetch(PDO::FETCH_ASSOC)):?>
                        <form action="admin_kin_home.php" method="post" class="textForm">
                            <input class="hidden" type="text" name="tbl" value="tbl_hero_alt">
                            <input class="hidden" type="number" name="id" value="<?php echo $row['id'];?>">
                            <input type="text" name="hText" value="<?php echo $row['text'];?>">
                            <input type="text" name="hCText" value="<?php echo $row['cap_text'];?>">
                            <input type="submit" name="submit-hero" value="Save">
                        </form>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
        </section>
        <section id="about">
            <h2>About Section:</h2>
            <div class="col">
                <h3>Images:</h3>
                <?php while($row = $getAbout->fetch(PDO::FETCH_ASSOC)):?>
                <div class="aboutImg">
                    <img src="../../images/<?php echo $row['img'];?>" alt="about image <?php echo $row['img'];?>">
                    <a href="admin_kin_image.php?img_id=<?php echo $row['id'];?>&tbl=tbl_about&page=admin_kin_home.php">Edit</a>
                </div>
                <?php endwhile;?>
            </div>
            <div class="col">
                <h3>Texts:</h3>
                <form action="admin_kin_home.php" method="post" class="textForm">
                <?php while($row = $getAboutT->fetch(PDO::FETCH_ASSOC)):?>
                    <input type="text" name="heading" value="<?php echo $row['heading'];?>">
                    <textarea name="p"><?php echo $row['p'];?></textarea>
                    <textarea name="p_sub"><?php echo $row['p_sub'];?></textarea>
                    <input type="submit" name="submit-about" value="Save">
                <?php endwhile;?>
                </form>
            </div>
        </section>
        <section id="video">
            <h2>Video Section:</h2>
            <div class="col">
                <h3>Videos:</h3>
                <form action="admin_kin_home.php" method="post" class="vidForm">
                <?php while($row = $getVideo->fetch(PDO::FETCH_ASSOC)):?>
                    <video controls muted>
                        <source src="../../media/<?php echo $row['video'];?>" type="video/mp4">
                        Sorry, your browser doesn't support embedded videos.
                    </video>
                    <input class="hidden" type="text" name="old_vid" value="<?php echo $row['video'];?>">
                    <input type="file" name="video" value="">
                    <p>(Note: this will erase your last video!)</p>
                    <input type="submit" value="Upload Video" name="submit-video">
                <?php endwhile;?>
                </form>
            </div>
            <div class="col">
                <h3>Texts:</h3>
                <form action="admin_kin_home.php" method="post" class="textForm">
                <?php while($row = $getVideoT->fetch(PDO::FETCH_ASSOC)):?>
                    <input type="text" name="heading" value="<?php echo $row['heading'];?>">
                    <textarea name="p"><?php echo $row['p'];?></textarea>
                    <input type="submit" name="submit-vid-text" value="Save">
                <?php endwhile;?>
                </form>
            </div>
        </section>
        <section id="test">
            <h2>Test Location Section:</h2>
            <div class="col">
                <h3>Texts:</h3>
                <div class="rows">
                    <div class="row">
                        <form action="admin_kin_home.php" method="post" class="textForm">
                            <h4>Add new test location:</h4>
                            <label for="name">Test location name:</label>
                            <input type="text" name="name" value="">
                            <label for="address">Address:</label>
                            <input type="text" name="address" value="">
                            <input type="submit" name="submit-test-new" value="Add">
                        </form>
                    </div>
                    <div class="row">
                        <h4>Exiting test locations:</h4>
                        <?php while($row = $getTest->fetch(PDO::FETCH_ASSOC)):?>
                        <form action="admin_kin_home.php" method="post" class="textForm">
                            <input class="hidden" type="number" name="id" value="<?php echo $row['id'];?>">
                            <input type="text" name="name" value="<?php echo $row['name'];?>">
                            <input type="text" name="address" value="<?php echo $row['address'];?>">
                            <div class="DandS">
                                <input type="submit" name="delete-test" value="Delete">
                                <input type="submit" name="submit-test" value="Save">
                            </div>
                        </form>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>