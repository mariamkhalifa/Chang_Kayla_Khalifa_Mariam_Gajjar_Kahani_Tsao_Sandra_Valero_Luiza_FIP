<?php
    require_once '../../load.php';
    confirm_logged_in();

    $tbl = 'tbl_event';
    $getEvent = getAll($tbl);
    $tblH = 'tbl_communityintro';
    $getComH = getAll($tblH);
    $tblSM = 'tbl_instagramfeed';
    $getComSM = getAll($tblSM);
    $tblShare = 'tbl_storyintro';
    $getComShare = getAll($tblShare);
    $tblHelp = 'tbl_helplines';
    $getComHelp = getAll($tblHelp);
    $tblEventH = 'tbl_eventsheading';
    $getEventH = getAll($tblEventH);

    if(!empty($_GET['createdE'])){
        $msg = $_GET['createdE'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['deletedE'])) {
        $msg = $_GET['deletedE'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedE'])) {
        $msg = $_GET['updatedE'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedImg'])){
        $msg = $_GET['updatedImg'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedComH'])){
        $msg = $_GET['updatedComH'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedSM'])){
        $msg = $_GET['updatedSM'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedShare'])){
        $msg = $_GET['updatedShare'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedHelp'])){
        $msg = $_GET['updatedHelp'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedEH'])){
        $msg = $_GET['updatedEH'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    }

    if(isset($_POST['submit-head'])) {
        $heading = trim($_POST['heading']);
        $text = trim($_POST['text']);
        $message = updateComH($heading, $text);
    }

    if(isset($_POST['submit-sm-head'])) {
        $heading = trim($_POST['heading']);
        $btn = trim($_POST['btn']);
        $message = updateComSM($heading, $btn);
    }

    if(isset($_POST['submit-share'])) {
        $heading = trim($_POST['heading']);
        $text = trim($_POST['text']);
        $formlabel = trim($_POST['formlabel']);
        $message = updateShare($heading, $text, $formlabel);
    }

    if(isset($_POST['submit-helpline'])) {
        $heading = trim($_POST['heading']);
        $text = trim($_POST['text']);
        $linkheading = trim($_POST['linkheading']);
        $link = trim($_POST['link']);
        $message = updateHelp($heading, $text, $linkheading, $link);
    }

    if(isset($_POST['submit-e-heading'])) {
        $heading = trim($_POST['heading']);
        $message = updateEventH($heading);
    }
    
    if(isset($_POST['submit-event-new'])) {
        if($_FILES['img']['size'] > 0 && $_FILES['img']['error'] == 0) {
            $img = $_FILES['img'];
            $name = trim($_POST['name']);
            $location = trim($_POST['location']);
            $month = trim($_POST['month']);
            $day = trim($_POST['day']);
            $time = trim($_POST['time']);
            $des = trim($_POST['des']);
            $link = trim($_POST['link']);
            $message = addEvent($img, $name, $location, $month, $day, $time, $des, $link);
        } else {
            return 'Please upload an image for new event.';
        }
    }

    if(isset($_POST['submit-event'])) {
        $id = trim($_POST['id']);
        $name = trim($_POST['name']);
        $location = trim($_POST['location']);
        $month = trim($_POST['month']);
        $day = trim($_POST['day']);
        $time = trim($_POST['time']);
        $des = trim($_POST['des']);
        $link = trim($_POST['link']);
        $message = updateEvent($id, $name, $location, $month, $day, $time, $des, $link);
    }

    if(isset($_POST['delete-event'])) {
        $id = trim($_POST['id']);
        $message = deleteEvent($id);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../template/head.php'; ?>
    <title>Edit Community Page</title>
</head>
<body>
    <div class="userCMS">
        <header>
            <h1>Edit Community Page</h1>
        <?php include '../template/header.php'; ?>
        <p class="bk"><a href="index.php"><-Back to Dashboard</a></p>
        <?php echo !empty($message)?$message: ''; ?>
        <section id="event">
            <div class="col">
                <h2>Heading:</h2>
                <form action="admin_kin_community.php" method="post" class="textForm">
                <?php while($row = $getComH->fetch(PDO::FETCH_ASSOC)):?>
                    <input type="text" name="heading" value="<?php echo $row['heading'];?>">
                    <textarea name="text"><?php echo $row['text'];?></textarea>
                    <input type="submit" name="submit-head" value="Save">
                <?php endwhile;?>
                </form>
            </div>
            <div class="col">
                <h2>Social Media Post Heading:</h2>
                <form action="admin_kin_community.php" method="post" class="textForm">
                <?php while($row = $getComSM->fetch(PDO::FETCH_ASSOC)):?>
                    <input type="text" name="heading" value="<?php echo $row['heading'];?>">
                    <input type="text" name="btn" value="<?php echo $row['btn'];?>">
                    <input type="submit" name="submit-sm-head" value="Save">
                <?php endwhile;?>
                </form>
            </div>
            <div class="col">
                <h2>Sharing:</h2>
                <form action="admin_kin_community.php" method="post" class="textForm">
                <?php while($row = $getComShare->fetch(PDO::FETCH_ASSOC)):?>
                    <input type="text" name="heading" value="<?php echo $row['heading'];?>">
                    <textarea name="text"><?php echo $row['text'];?></textarea>
                    <input type="text" name="formlabel" value="<?php echo $row['formlabel'];?>">
                    <input type="submit" name="submit-share" value="Save">
                <?php endwhile;?>
                </form>
            </div>
            <div class="col">
                <h2>Helpline:</h2>
                <form action="admin_kin_community.php" method="post" class="textForm">
                <?php while($row = $getComHelp->fetch(PDO::FETCH_ASSOC)):?>
                    <input type="text" name="heading" value="<?php echo $row['heading'];?>">
                    <textarea name="text"><?php echo $row['text'];?></textarea>
                    <div class="comImg">
                        <img src="../../images/<?php echo $row['img'];?>" alt="helpline image <?php echo $row['img'];?>">
                        <a href="admin_kin_image.php?img_id=<?php echo $row['id'];?>&tbl=tbl_helplines&page=admin_kin_community.php">Edit</a>
                    </div>
                    <input type="text" name="linkheading" value="<?php echo $row['linkheading'];?>">
                    <input type="text" name="link" value="<?php echo $row['link'];?>">
                    <input type="submit" name="submit-helpline" value="Save">
                <?php endwhile;?>
                </form>
            </div>
            <div class="col">
                <h2>Events Heading:</h2>
                <form action="admin_kin_community.php" method="post" class="textForm">
                <?php while($row = $getEventH->fetch(PDO::FETCH_ASSOC)):?>
                    <input type="text" name="heading" value="<?php echo $row['heading'];?>">
                    <input type="submit" name="submit-e-heading" value="Save">
                <?php endwhile;?>
            </div>
            <div class="col">
                <h2>Events:</h2>
                <form action="admin_kin_community.php" method="post" class="eventForm" enctype="multipart/form-data">
                    <h3>Add new event:</h3>
                    <label for="img">Please upload cover image:*</label>
                    <input type="file" name="img" value="" reuqired>
                    <label for="name">Event name:*</label>
                    <input type="text" name="name" value="" required>
                    <label for="location">Event location:*</label>
                    <input type="text" name="location" value="" required>
                    <label for="month">Month or event type:*</label>
                    <select name="month" id="month" required>
                        <option value="">--Please select a month--</option>
                        <option value="Ongoing">Ongoing Event</option>
                        <option value="January">January</option>
                        <option value="Febuary">Febuary</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                    <label for="day">Day:</label>
                    <select name="day">
                        <option value="">--Please select a day--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <label for="time">Time:</label>
                    <input type="text" name="time" value="" placeholder="'Monday & Tuesday, 1 PM - 3 PM', or '4 PM - 5 PM'" required>
                    <label for="des">Description:</label>
                    <textarea name="des"></textarea>
                    <label for="link">Link:</label>
                    <input type="text" name="link" value="">
                    <p>* required</p>
                    <input type="submit" name="submit-event-new" value="Create Event">
                </form>
                <div id="eventList">
                    <h3>Edit events:</h3>
                    <?php while($row = $getEvent->fetch(PDO::FETCH_ASSOC)):?>
                    <form action="admin_kin_community.php" method="post" class="eventForm">
                        <input class="hidden" type="text" name="id" value="<?php echo $row['id'];?>">
                        <h3>Current Image:</h3>
                        <img src="../../images/<?php echo $row['img'];?>" alt="event image <?php echo $row['img'];?>">
                        <a href="admin_kin_image.php?img_id=<?php echo $row['id'];?>&tbl=tbl_event&page=admin_kin_community.php">Edit</a>
                        <label for="name">Event name:</label>
                        <input type="text" name="name" value="<?php echo $row['heading'];?>">
                        <label for="location">Event location:</label>
                        <input type="text" name="location" value="<?php echo $row['location'];?>">
                        <label for="month">Month or event type:</label>
                        <select name="month" id="month">
                            <option value="<?php echo $row['month'];?>"><?php echo $row['month'];?></option>
                            <option value="Ongoing">Ongoing Event</option>
                            <option value="January">January</option>
                            <option value="Febuary">Febuary</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        <label for="day">Day:</label>
                        <select name="day">
                            <option value="<?php echo $row['day'];?>"><?php echo $row['day'];?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        <label for="time">Time:</label>
                        <input type="text" name="time" value="<?php echo $row['time'];?>">
                        <label for="des">Description:</label>
                        <textarea name="des"><?php echo $row['des'];?></textarea>
                        <label for="link">Link:</label>
                        <input type="text" name="link" value="<?php echo $row['link'];?>">
                        <div class="DandE">
                            <input type="submit" name="delete-event" value="Delete Event">
                            <input type="submit" name="submit-event" value="Edit Event">
                        </div>
                    </form>
                    <?php endwhile;?>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>