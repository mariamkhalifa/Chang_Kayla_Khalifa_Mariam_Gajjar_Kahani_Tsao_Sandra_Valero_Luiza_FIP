<?php
    require_once '../../load.php';
    confirm_logged_in();

    $tblFaq = 'tbl_faq';
    $getFaq = getAll($tblFaq);

    if(!empty($_GET['addFaq'])){
        $msg = $_GET['addFaq'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedFaq'])) {
        $msg = $_GET['updatedFaq'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['deletedFaq'])) {
        $msg = $_GET['deletedFaq'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    }

    if(isset($_POST['submit-new-faq'])) {
        $q = trim($_POST['q']);
        $a = trim($_POST['a']);
        $message = createFaq($q, $a);
    }

    if(isset($_POST['submit-faq'])) {
        $id = trim($_POST['id']);
        $q = trim($_POST['q']);
        $a = trim($_POST['a']);
        $message = updateFaq($id, $q, $a);
    }

    if(isset($_POST['delete-faq'])) {
        $id = trim($_POST['id']);
        $message = deleteFaq($id);
    }

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
            <h1>Edit FAQ Page</h1>
        <?php include '../template/header.php'; ?>
        <a href="index.php"><-Back to Dashboard</a>
        <section id="faq">
            <h2>Add new question and answer!</h2>
            <form action="admin_kin_faq.php" method="post" id="faqForm">
                <label for="q">Question:</label>
                <input type="text" name="q" value="" required>
                <label for="a">Answer:</label>
                <textarea name="a" required></textarea>
                <input type="submit" name="submit-new-faq" class="submit">
            </form>
            <div id="faqList">
                <h3>FAQ List:</h3>
                <?php while($row = $getFaq->fetch(PDO::FETCH_ASSOC)):?>
                <form action="admin_kin_faq.php" method="post" class="faqForm">
                    <input class="hidden" type="number" name="id" value="<?php echo $row['id'];?>">
                    <label for="q">Question <?php echo $row['id'];?>:</label>
                    <input type="text" name="q" value="<?php echo $row['question'];?>">
                    <label for="a">Answer:</label>
                    <textarea name="a"><?php echo $row['answer'];?></textarea>
                    <input type="submit" name="submit-faq" value="Save">
                    <input type="submit" name="delete-faq" value="Delete">
                </form>
                <?php endwhile;?>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>