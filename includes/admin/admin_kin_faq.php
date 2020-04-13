<?php
    require_once '../../load.php';
    confirm_logged_in();

    $tblFaq = 'tbl_faq';
    $getFaq = getAll($tblFaq);
    $tblFaqIntro = 'tbl_faqintro';
    $getFaqH = getAll($tblFaqIntro);
    $tblLinkH = 'tbl_factslinks';
    $getLinksH = getAll($tblLinkH);
    $tblLinks = 'tbl_infolinksdata';
    $getFaqLinks = getAll($tblLinks);
    $tblConLink = 'tbl_factsmore';
    $getConLink = getAll($tblConLink);

    if(!empty($_GET['addFaq'])){
        $msg = $_GET['addFaq'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedFaq'])) {
        $msg = $_GET['updatedFaq'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['deletedFaq'])) {
        $msg = $_GET['deletedFaq'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedFaqH'])){
        $msg = $_GET['updatedFaqH'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedFaqLinkH'])){
        $msg = $_GET['updatedFaqLinkH'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['createdFaqLink'])){
        $msg = $_GET['createdFaqLink'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedFaqSingleLink'])){
        $msg = $_GET['updatedFaqSingleLink'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['deletedFaqSingleLink'])){
        $msg = $_GET['deletedFaqSingleLink'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    } else if(!empty($_GET['updatedFaqCon'])){
        $msg = $_GET['updatedFaqCon'];
        $message = '<p class="updateMsg">'.$msg.'</p>';
    }

    if(isset($_POST['submit-faq-heading'])) {
        $heading = trim($_POST['heading']);
        $text = trim($_POST['text']);
        $message = updateFaqH($heading, $text);
    }

    if(isset($_POST['submit-link-h'])) {
        $heading = trim($_POST['heading']);
        $text = trim($_POST['text']);
        $message = updateFaqLinkH($heading, $text);
    }

    if(isset($_POST['submit-new-link'])) {
        if($_FILES['linkImg']['size'] > 0 && $_FILES['linkImg']['error'] == 0){
            $video = $_FILES['linkImg'];
            $link = trim($_POST['link']);
            $message = addFaqLink($linkImg, $link);
        } else {
            return 'Please upload image first!';
        }
    }

    if(isset($_POST['submit-link'])) {
        $id = trim($_POST['id']);
        $link = trim($_POST['link']);
        $message = updateFaqLink($id, $link);
    }

    if(isset($_POST['delete-link'])) {
        $id = trim($_POST['id']);
        $message = deleteFaqLink($id);
    }

    if(isset($_POST['submit-con-link'])) {
        $heading = trim($_POST['heading']);
        $text = trim($_POST['text']);
        $message = updateFaqCon($heading, $text);
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
        <p class="bk"><a href="index.php"><-Back to Dashboard</a></p>
        <?php echo !empty($message)?$message: ''; ?>
        <section id="faq">
            <h2>FAQ Page:</h2>
            <div class="col">
                <h3>Heading:</h3>
                <form action="admin_kin_faq.php" method="post" class="textForm">
                <?php while($row = $getFaqH->fetch(PDO::FETCH_ASSOC)):?>
                    <input type="text" name="heading" value="<?php echo $row['heading'];?>">
                    <textarea name="text"><?php echo $row['text'];?></textarea>
                    <input type="submit" name="submit-faq-heading" value="Save">
                <?php endwhile;?>
                </form>
            </div>
            <div class="col">
                <h3>Links:</h3>
                <div class="rows">
                    <div class="row">
                        <form action="admin_kin_faq.php" method="post" class="textForm faq-link-form">
                        <?php while($row = $getLinksH->fetch(PDO::FETCH_ASSOC)):?>
                            <input type="text" name="heading" value="<?php echo $row['heading'];?>">
                            <textarea name="text"><?php echo $row['text'];?></textarea>
                            <input type="submit" name="submit-link-h" value="Save">
                        <?php endwhile;?>
                        </form>
                    </div>
                    <div class="row">
                        <form action="admin_kin_faq.php" method="post" class="faqLinksForm" enctype="multipart/form-data">
                            <label for="linkImg">Link Image:</label>
                            <input type="file" name="linkImg" value="" required>
                            <label for="link">Link:</label>
                            <input type="text" name="link" value="" required>
                            <input type="submit" name="submit-new-link" value="Add">
                        </form>
                    </div>
                </div>
                <div class="rows faq-link-row">
                    <?php while($row = $getFaqLinks->fetch(PDO::FETCH_ASSOC)):?>
                    <form action="admin_kin_faq.php" method="post" class="textForm">
                        <div class="linksImg">
                            <img src="../../images/<?php echo $row['img'];?>" alt="faq links image <?php echo $row['img'];?>">
                            <a href="admin_kin_image.php?img_id=<?php echo $row['id'];?>&tbl=tbl_infolinksdata&page=admin_kin_faq.php">Edit</a>
                        </div>
                        <input class="hidden" type="number" name="id" value="<?php echo $row['id'];?>">
                        <input type="text" name="link" value="<?php echo $row['link'];?>">
                        <div class="DandS">
                            <input type="submit" name="delete-link" value="Delete">
                            <input type="submit" name="submit-link" value="Save">
                        </div>
                    </form>
                    <?php endwhile;?>
                </div>
            </div>
            <div class="col">
                <h3>Contact Link:</h3>
                <form action="admin_kin_faq.php" method="post" class="textForm">
                <?php while($row = $getConLink->fetch(PDO::FETCH_ASSOC)):?>
                    <input type="text" name="heading" value="<?php echo $row['heading'];?>">
                    <textarea name="text"><?php echo $row['text'];?></textarea>
                    <div class="linksImg">
                        <img id="linkImg" src="../../images/<?php echo $row['img'];?>" alt="contact link image <?php echo $row['img'];?>">
                        <a href="admin_kin_image.php?img_id=<?php echo $row['id'];?>&tbl=tbl_factsmore&page=admin_kin_faq.php">Edit</a>
                    </div>
                    <input type="submit" name="submit-con-link" value="Save">
                <?php endwhile;?>
                </form>
            </div>
            <div class="col">
                <h2>FAQs:</h2>
                <div class="rows faq-row">
                    <form action="admin_kin_faq.php" method="post" class="faqForm">
                        <h3>Add new question and answer!</h3>
                        <label for="q">Question:</label>
                        <input type="text" name="q" value="" required>
                        <label for="a">Answer:</label>
                        <textarea name="a" required></textarea>
                        <input type="submit" name="submit-new-faq" value="Add">
                    </form>
                    <div id="faqList">
                        <h3>FAQ List: (scroll)</h3>
                        <div class="longWrapper">
                            <?php while($row = $getFaq->fetch(PDO::FETCH_ASSOC)):?>
                            <form action="admin_kin_faq.php" method="post" class="faqForm">
                                <input class="hidden" type="number" name="id" value="<?php echo $row['id'];?>">
                                <label for="q">Question ID <?php echo $row['id'];?>:</label>
                                <input type="text" name="q" value="<?php echo $row['question'];?>">
                                <label for="a">Answer:</label>
                                <textarea name="a"><?php echo $row['answer'];?></textarea>
                                <div class="DandS">
                                    <input type="submit" name="delete-faq" value="Delete">
                                    <input type="submit" name="submit-faq" value="Save">
                                </div>
                            </form>
                            <?php endwhile;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>