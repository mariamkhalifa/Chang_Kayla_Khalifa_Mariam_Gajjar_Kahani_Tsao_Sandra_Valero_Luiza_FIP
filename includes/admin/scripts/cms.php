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
        return '<p class="updateMsg">There was a problem accessing the info</p>';
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
        return '<p class="updateMsg">There was a problem accessing the info</p>';
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
        return '<p class="updateMsg">There was a problem accessing the info</p>';
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
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function updateAbout($heading, $p, $p_sub, $p_bold) {
    $pdo = Database::getInstance()->getConnection();

    $update_hero_query = 'UPDATE `tbl_about` SET heading =:heading, p =:p, p_sub =:p_sub, p_bold =:p_bold WHERE id =:id';
    $single_update = $pdo->prepare($update_hero_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':p'=>$p,
            ':p_sub'=>$p_sub,
            ':p_bold'=>$p_bold,
            ':id'=>'1'
        )
    );

    if($updated_single){
        redirect_to('admin_kin_home.php?updatedAbout=You have updated the about texts!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
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
    
        $image_path = '../../video/';
    
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $targetpath         = $image_path . $generated_filename;
    
        if (!move_uploaded_file($vid['tmp_name'], $targetpath)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        $deleteOld = unlink('../../../video/'.$old_vid);

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
            return '<p class="updateMsg">something went wrong with the update</p>';
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
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function updateFaqH($heading, $text) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_faqintro` SET heading =:heading, text =:text';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':text'=>$text
        )
    );

    if($updated_single){
        redirect_to('admin_kin_home.php?updatedFaqH=You have updated the faq heading!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function updateTestH($heading, $text) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_locationsintro` SET heading =:heading, text =:text';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':text'=>$text
        )
    );

    if($updated_single){
        redirect_to('admin_kin_home.php?updatedTestH=You have updated the test location heading!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function updateTestL($linktext, $link) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_locationsintro` SET linktext =:linktext, link =:link';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':linktext'=>$linktext,
            ':link'=>$link
        )
    );

    if($updated_single){
        redirect_to('admin_kin_home.php?updatedTestL=You have updated the test location links!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
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
        return '<p class="updateMsg">Something went wrong</p>';
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
        return '<p class="updateMsg">Something went wrong with the update.</p>';
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

function updateImg($id, $img, $tbl, $page) {
    try { 
        $pdo = Database::getInstance()->getConnection();

        $image          = $img;
        $upload_file    = pathinfo($image['name']);
        $accepted_types = array('gif', 'jpg', 'jpe', 'png', 'jpeg', 'webp');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Wrong file type!');
        }
    
        $image_path = '../../images/';
    
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
            redirect_to($page.'?updatedImg=You have updated the image sucessfully!');
        } else {
            return '<p class="updateMsg">Something went wrong with the update.</p>';
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
    
        $image_path = '../../images/';
    
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $targetpath         = $image_path . $generated_filename;
    
        if (!move_uploaded_file($cover['tmp_name'], $targetpath)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        $insert_e_query = 'INSERT INTO tbl_event(img, heading, location, month, day, time, des, link)';
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

    $update_e_query = 'UPDATE `tbl_event` SET heading =:name, location =:location, month =:month, day =:day, time =:time, des =:des, link =:link WHERE id =:id';
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

    // echo $single_update->debugDumpParams();
    // exit;

    if($single_update){
        redirect_to('admin_kin_community.php?updatedE=You have updated the event!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
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

function updateFaqLinkH($heading, $text) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_factslink` SET heading =:heading, text =:text';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':text'=>$text
        )
    );

    if($updated_single){
        redirect_to('admin_kin_home.php?updatedFaqLinkH=You have updated the faq links heading!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function addFaqLink($linkImg, $link) {
    try {
        $pdo = Database::getInstance()->getConnection();

        $cover          = $linkImg;
        $upload_file    = pathinfo($cover['name']);
        $accepted_types = array('gif', 'jpg', 'jpe', 'png', 'jpeg', 'webp');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Wrong file type!');
        }
    
        $image_path = '../../images/';
    
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $targetpath         = $image_path . $generated_filename;
    
        if (!move_uploaded_file($cover['tmp_name'], $targetpath)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        $insert_e_query = 'INSERT INTO tbl_infolinksdata(img, link)';
        $insert_e_query .= ' VALUES(:img, :link)';

        $insert_e       = $pdo->prepare($insert_e_query);
        $insert_e_result = $insert_e->execute(
            array(
                ':img'=>$generated_filename,
                ':link'=>$link
            )
        );

        $last_uploaded_id = $pdo->lastInsertId();
        if ($insert_e_result && !empty($last_uploaded_id)) {
            redirect_to('admin_kin_faq.php?createdFaqLink=You have created the new link sucessfully!');
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}

function updateFaqLink($id, $link) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_infolinksdata` SET link =:link';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':link'=>$link
        )
    );

    if($updated_single){
        redirect_to('admin_kin_faq.php?updatedFaqSingleLink=You have updated the faq link!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function deleteFaqLink($id) {
    $pdo = Database::getInstance()->getConnection();

    $delete_faq_query = 'DELETE FROM tbl_infolinksdata WHERE id=:id';
    $delete_faq_set = $pdo->prepare($delete_faq_query);
    $delete_faq_result = $delete_faq_set->execute(array(
        ':id'=>$id
    ));

    if($delete_faq_result && $delete_faq_set->rowCount() > 0){
        redirect_to('admin_kin_faq.php?deletedFaqSingleLink=You have deleted the link!');
    }else{
        return false;
    }
}

function updateFaqCon($heading, $text) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_factsmore` SET heading =:heading, text =:text';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':text'=>$text
        )
    );

    if($updated_single){
        redirect_to('admin_kin_home.php?updatedFaqCon=You have updated the faq contact heading!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
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
        return '<p class="updateMsg">Something went wrong</p>';
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
        return '<p class="updateMsg">Something went wrong with the update.</p>';
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

function updateComH($heading, $text) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_communityintro` SET heading =:heading, text =:text';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':text'=>$text
        )
    );

    if($updated_single){
        redirect_to('admin_kin_community.php?updatedComH=You have updated the community page heading!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function updateComSM($heading, $btn){
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_instagramfeed` SET heading =:heading, btn =:btn';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':btn'=>$btn
        )
    );

    if($updated_single){
        redirect_to('admin_kin_community.php?updatedSM=You have updated the community social media heading!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function updateShare($heading, $text, $formlabel) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_storyintro` SET heading =:heading, text =:text, formlabel =:formlabel';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':text'=>$text,
            ':formlabel'=>$formlabel
        )
    );

    if($updated_single){
        redirect_to('admin_kin_community.php?updatedShare=You have updated the sharing section heading!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function updateHelp($heading, $text, $linkheading, $link) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_helplines` SET heading =:heading, text =:text, linkheading =:linkheading, link =:link';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':text'=>$text,
            ':linkheading'=>$linkheading,
            ':link'=>$link
        )
    );

    if($updated_single){
        redirect_to('admin_kin_community.php?updatedHelp=You have updated the helpline heading!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function updateEventH($heading) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_eventsheading` SET heading =:heading';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading
        )
    );

    if($updated_single){
        redirect_to('admin_kin_community.php?updatedEH=You have updated the events heading!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function updateContactH($heading, $text) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_contactintro` SET heading =:heading, text =:text';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':text'=>$text
        )
    );

    if($updated_single){
        redirect_to('admin_kin_contact.php?updatedConH=You have updated the contact heading!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function updateSM($heading, $intro, $text) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_socialmedia` SET heading =:heading, intro =:intro, text =:text';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':heading'=>$heading,
            ':intro'=>$intro,
            ':text'=>$text
        )
    );

    if($updated_single){
        redirect_to('admin_kin_contact.php?updatedConSM=You have updated the social media heading!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}

function updateInfo($address, $phone, $email) {
    $pdo = Database::getInstance()->getConnection();

    $update_query = 'UPDATE `tbl_contactinfo` SET address =:address, phone =:phone, email =:email';
    $single_update = $pdo->prepare($update_query);
    $updated_single = $single_update->execute(
        array(
            ':address'=>$address,
            ':phone'=>$phone,
            ':email'=>$email
        )
    );

    if($updated_single){
        redirect_to('admin_kin_contact.php?updatedConInfo=You have updated the contact information!');
    }else{
        return '<p class="updateMsg">Something went wrong with the update.</p>';
    }
}