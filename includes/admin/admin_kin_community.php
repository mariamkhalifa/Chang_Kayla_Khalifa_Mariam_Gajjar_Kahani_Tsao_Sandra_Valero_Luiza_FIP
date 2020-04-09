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
        <?php echo !empty($message)?$message: ''; ?>
        <section id="event">
            <form action="admin_kin_home.php" method="post" class="eventForm">
                <h2>Add new event:</h2>
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
                <label for="time">Time: (Format example: "Monday & Tuesday, 1 PM - 3 PM", or "4 PM - 5 PM")</label>
                <input type="text" name="time" value="" required>
                <label for="des">Description:</label>
                <textarea name="des"></textarea>
                <label for="link">Link:</label>
                <input type="url" name="link" value="">
                <input type="submit" name="submit-event-new" value="Create Event">
            </form>
            <div id="eventList">
                <h2>Edit events:</h2>
                <?php while($row = $getEvent->fetch(PDO::FETCH_ASSOC)):?>
                <form action="admin_kin_home.php" method="post" class="eventForm">
                    <input class="hidden" type="text" name="id" value="<?php echo $row['id'];?>">
                    <h3>Current Image:</h3>
                    <img src="../../images/<?php echo $row['img'];?>" alt="event image <?php echo $row['img'];?>">
                    <a href="admin_kin_image.php?img_id=<?php echo $row['id'];?>&tbl=tbl_event&page=admin_kin_community.php">Edit</a>
                    <label for="name">Event name:</label>
                    <input type="text" name="name" value="<?php echo $row['heading'];?>">
                    <label for="address">Event location:</label>
                    <input type="text" name="address" value="<?php echo $row['location'];?>">
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
                    <input type="url" name="link" value="<?php echo $row['link'];?>">
                    <input type="submit" name="submit-event" value="Edit Event">
                    <input type="submit" name="delete-event" value="Delete Event">
                </form>
                <?php endwhile;?>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>