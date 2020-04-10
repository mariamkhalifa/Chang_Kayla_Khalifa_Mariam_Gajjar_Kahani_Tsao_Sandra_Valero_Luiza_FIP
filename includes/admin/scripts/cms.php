<?php

function greeting() {
    $nowtime = date("G");
    if($nowtime <= 10 && $nowtime >= 0){
        return 'Good morning';
    }else if($nowtime >= 11 && $nowtime <= 17){
        return 'Good afternoon';
    }else{
        return 'Good evening';
    }
}

function getAll($tbl) {
    $pdo = Database::getInstance()->getConnection();

    $query= 'SELECT * FROM ' .$tbl;
    $result = $pdo->query($query);

    // echo $result->debugDumpParams();
    // exit;

    if($result){
        return $result;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
}

function getImg($id, $tbl) {
    $pdo = Database::getInstance()->getConnection();

    $query= 'SELECT * FROM ' .$tbl. ' WHERE id =:id';
    $result = $pdo->prepare($query);
    $result->execute(
        array(
            ':id'=>$id
        )
    );

    // echo $result->debugDumpParams();
    // exit;

    if($result){
        return $result;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
}

function getOneEvent($tbl) {
    $pdo = Database::getInstance()->getConnection();

    $query= 'SELECT * FROM ' .$tbl. ' WHERE id =:id';
    $result = $pdo->prepare($query);
    $result->execute(
        array(
            ':id'=>'1'
        )
    );

    // echo $result->debugDumpParams();
    // exit;

    if($result){
        return $result;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
}

function updateHero($tbl, $id, $text, $cap_text) {
    $pdo = Database::getInstance()->getConnection();

    $update_hero_query = 'UPDATE '.$tbl.' SET text =:text, cap_text =:cap_text WHERE id =:id';
    $single_update = $pdo->prepare($update_hero_query);
    $updated_single = $single_update->execute(
        array(
            ':text'=>$text,
            ':cap_text'=>$cap_text,
            ':id'=>$id
        )
    );

    if($updated_single){
        redirect_to('admin_kin_home.php?updatedHero=You have updated the hero texts!');
    }else{
        return 'Something went wrong with the update.';
    }
}

function updateAbout($heading, $p, $p_sub) {
    $pdo = Database::getInstance()->getConnection();

    $update_hero_query = 'UPDATE `tbl_about` SET heading =:heading, p =:p, p_sub =:p_sub WHERE id =:id';
    $single_update = $pdo->prepare($update_hero_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':p'=>$p,
            ':p_sub'=>$p_sub,
            ':id'=>'1'
        )
    );

    if($updated_single){
        redirect_to('admin_kin_home.php?updatedAbout=You have updated the about texts!');
    }else{
        return 'Something went wrong with the update.';
    }
}

function updateVideo($video, $old_vid) {
    try {
        $pdo = Database::getInstance()->getConnection();

        $vid          = $video;
        $upload_file    = pathinfo($vid['name']);
        $accepted_types = array('mp4', 'avi', 'mov', 'wmv', 'flv', 'avchd');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Wrong file type!');
        }
    
        $image_path = '../../../media/';
    
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $targetpath         = $image_path . $generated_filename;
    
        if (!move_uploaded_file($vid['tmp_name'], $targetpath)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        $deleteOld = unlink('../../../media/'.$old_vid);

        $update_hero_query = 'UPDATE `tbl_video` SET video =:video WHERE id =:id';
        $single_update = $pdo->prepare($update_hero_query);
        $updated_single = $single_update->execute(
            array(
                ':video'=>$generated_filename,
                ':id'=>'1'
            )
        );

        if($deleteOld && $updated_single) {
            redirect_to('index.php?updatedVid=You have updated the video sucessfully!');
        } else {
            return 'something went wrong with the update';
        }
        
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}

function updateVidT($heading, $p) {
    $pdo = Database::getInstance()->getConnection();

    $update_hero_query = 'UPDATE `tbl_video` SET heading =:heading, p =:p WHERE id =:id';
    $single_update = $pdo->prepare($update_hero_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':p'=>$p,
            ':id'=>'1'
        )
    );

    if($updated_single){
        redirect_to('admin_kin_home.php?updatedVidT=You have updated the video texts!');
    }else{
        return 'Something went wrong with the update.';
    }
}

function addTestLocation($name, $address) {
    $pdo = Database::getInstance()->getConnection();

    $insert_new_query = "INSERT INTO tbl_test_location (name, address) VALUES (:name, :address);";
    $test_add = $pdo->prepare($insert_new_query);
    $result = $test_add->execute(
        array(
            ':name'=>$name,
            ':address'=>$address
        )
    );
    
    if($result){
        redirect_to('admin_kin_home.php?addTest=You have added a new test location!');
    } else {
        return 'Something went wrong';
    }
}

function updateTestLocation($id, $name, $address) {
    $pdo = Database::getInstance()->getConnection();

    $update_hero_query = 'UPDATE `tbl_test_location` SET name =:name, address =:address WHERE id =:id';
    $single_update = $pdo->prepare($update_hero_query);
    $updated_single = $single_update->execute(
        array(
            ':name'=>$name,
            ':address'=>$address,
            ':id'=>$id
        )
    );

    if($updated_single){
        redirect_to('admin_kin_home.php?updatedTest=You have updated the test location!');
    }else{
        return 'Something went wrong with the update.';
    }
}

function deleteTestLocation($id) {
    $pdo = Database::getInstance()->getConnection();

    $delete_test_query = 'DELETE FROM tbl_test_location WHERE id=:id';
    $delete_test_set = $pdo->prepare($delete_test_query);
    $delete_test_result = $delete_test_set->execute(array(
        ':id'=>$id
    ));

    if($delete_test_result && $delete_test_set->rowCount() > 0){
        redirect_to('admin_kin_home.php?deletedT=You have deleted the test location!');
    }else{
        return false;
    }
}

function updateImg($id, $img, $tbl) {
    try {
        $pdo = Database::getInstance()->getConnection();

        $image          = $img;
        $upload_file    = pathinfo($image['name']);
        $accepted_types = array('gif', 'jpg', 'jpe', 'png', 'jpeg', 'webp');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Wrong file type!');
        }
    
        $image_path = '../../../images/';
    
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $targetpath         = $image_path . $generated_filename;
    
        if (!move_uploaded_file($image['tmp_name'], $targetpath)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        $update_hero_query = 'UPDATE ' .$tbl. ' SET img =:img WHERE id =:id';
        $single_update = $pdo->prepare($update_hero_query);
        $updated_single = $single_update->execute(
            array(
                ':img'=>$generated_filename,
                ':id'=>$id
            )
        );

        if($updated_single) {
            redirect_to('admin_kin_image.php?updatedImg=You have updated the image sucessfully!');
        } else {
            return 'something went wrong with the update';
        }
        
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}

function addEvent($img, $name, $location, $month, $day, $time, $des, $link) {
    try {
        $pdo = Database::getInstance()->getConnection();

        $cover          = $img;
        $upload_file    = pathinfo($cover['name']);
        $accepted_types = array('gif', 'jpg', 'jpe', 'png', 'jpeg', 'webp');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Wrong file type!');
        }
    
        $image_path = '../../../images/';
    
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $targetpath         = $image_path . $generated_filename;
    
        if (!move_uploaded_file($cover['tmp_name'], $targetpath)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        $insert_e_query = 'INSERT INTO tbl_event(img, name, location, month, day, time, des, link)';
        $insert_e_query .= ' VALUES(:img, :name, :location, :month, :day, :time, :des, :link)';

        $insert_e       = $pdo->prepare($insert_e_query);
        $insert_e_result = $insert_e->execute(
            array(
                ':img'=>$generated_filename,
                ':name'=>$name,
                ':location'=>$location,
                ':month'=>$month,
                ':day'=>$day,
                ':time'=>$time,
                ':des'=>$des,
                ':link'=>$link
            )
        );

        $last_uploaded_id = $pdo->lastInsertId();
        if ($insert_e_result && !empty($last_uploaded_id)) {
            redirect_to('admin_kin_community.php?createdE=You have created the event sucessfully!');
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}

function updateEvent($id, $name, $location, $month, $day, $time, $des, $link) {
    $pdo = Database::getInstance()->getConnection();

    $update_e_query = 'UPDATE `tbl_event` SET name =:name, location =:location, month =:month, day =:day, time =:time, des =:des, link =:link WHERE id =:id';
    $single_update = $pdo->prepare($update_e_query);
    $updated_single = $single_update->execute(
        array(
            ':name'=>$name,
            ':location'=>$location,
            ':month'=>$month,
            ':day'=>$day,
            ':time'=>$time,
            ':des'=>$des,
            ':link'=>$link,
            ':id'=>$id
        )
    );

    if($updated_single){
        redirect_to('admin_kin_community.php?updatedEvent=You have updated the event!');
    }else{
        return 'Something went wrong with the update.';
    }
}

function deleteEvent($id) {
    $pdo = Database::getInstance()->getConnection();

    $delete_e_query = 'DELETE FROM tbl_event WHERE id=:id';
    $delete_e_set = $pdo->prepare($delete_e_query);
    $delete_e_result = $delete_e_set->execute(array(
        ':id'=>$id
    ));

    if($delete_e_result && $delete_e_set->rowCount() > 0){
        redirect_to('admin_kin_community.php?deletedE=You have deleted the event!');
    }else{
        return false;
    }
}

function createFaq($q, $a) {
    $pdo = Database::getInstance()->getConnection();

    $insert_new_query = "INSERT INTO tbl_faq (question, answer) VALUES (:q, :a);";
    $user_add = $pdo->prepare($insert_new_query);
    $result = $user_add->execute(
        array(
            ':q'=>$q,
            ':a'=>$a
        )
    );
    
    if($result){
        redirect_to('admin_kin_faq.php?addFaq=You have added a new question and answer!');
    } else {
        return 'Something went wrong';
    }
}

function updateFaq($id, $q, $a) {
    $pdo = Database::getInstance()->getConnection();

    $update_faq_query = 'UPDATE `tbl_faq` SET question =:q, answer =:a WHERE id =:id';
    $single_update = $pdo->prepare($update_faq_query);
    $updated_single = $single_update->execute(
        array(
            ':q'=>$q,
            ':a'=>$a,
            ':id'=>$id
        )
    );

    if($updated_single){
        redirect_to('admin_kin_faq.php?updatedFaq=You have updated the question and answer!');
    }else{
        return 'Something went wrong with the update.';
    }
}

function deleteFaq($id) {
    $pdo = Database::getInstance()->getConnection();

    $delete_faq_query = 'DELETE FROM tbl_faq WHERE id=:id';
    $delete_faq_set = $pdo->prepare($delete_faq_query);
    $delete_faq_result = $delete_faq_set->execute(array(
        ':id'=>$id
    ));

    if($delete_faq_result && $delete_faq_set->rowCount() > 0){
        redirect_to('admin_kin_faq.php?deletedFaq=You have deleted the question and answer!');
    }else{
        return false;
    }
}