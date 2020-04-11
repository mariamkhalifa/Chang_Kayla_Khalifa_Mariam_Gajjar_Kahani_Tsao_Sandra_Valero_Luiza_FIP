<?php

function getAllResults($tbl) {
    $pdo = Database::getInstance()->getConnection();
    $get_all_query = 'SELECT * FROM ' .$tbl;
    $get_all_set = $pdo->query($get_all_query);
    $result = $get_all_set->execute();
    $result = array();
    while($row = $get_all_set->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}

function subscribe($email) {
    
    $pdo = Database::getInstance()->getConnection();

    $check_exist = 'SELECT COUNT(*) FROM `tbl_subscription` WHERE email =:email';
    $sub_email = $pdo->prepare($check_exist);
    $result = $sub_email->execute(
        array(
            ':email'=>$email
        )
    );

    if($sub_email->fetchColumn()>0){
        return $msg = 'This email has already signed up.';
    }else{
        $insert_sub_query = "INSERT INTO tbl_subscription (email) VALUES (:email);";
        $sub_add = $pdo->prepare($insert_sub_query);
        $result = $sub_add->execute(
            array(
                ':email'=>$email
            )
        );

        
        
        if($result){
            $recipient = $email;
            $subject = "Hello, let's Keep It Neutral.";
            $message = '<html><body>';
            $message .= '<h2>Welcome!</h2>';
            $message .= '<p>We are happy to have you.</p>';
            $message .= '<p>Your have signed up for Keep It Neutral news and events!</p>';
            $message .= '<p>Have a wonderful day.</p>';
            $message .= '<h5>Sincerely,</h5>';
            $message .= '<h5>Keep It Neutral</h5>';
            $message .= '</body></html>';
            $from = "noreply@keepitneutral.ca";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html'. "\r\n";
            $headers .= 'From: '.$from."\r\n";
            $headers .= 'Reply-To: Neutral person <'.$email.'>' . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            
            mail($recipient, $subject, $message, $headers);
            
            return $msg = 'Thank you for subscribing!';
        } else {
            return $msg = 'Something went wrong with the subscription!';
        }

        return $msg;
    }
}

function newStory($story) {
    $pdo = Database::getInstance()->getConnection();

    $story_words = explode(' ', $story);
    
    for ($i=0; $i < count($story_words); $i++) {        
        $new_words = Array(strtolower($story_words[$i]));
    }
  
    if(in_array('fuck',$new_words)){
        return $msg = 'Please be nice when choosing words to use! Story not submitted!';
    }else{
        $insert_story_query = "INSERT INTO tbl_story (story) VALUES (:story);";
        $story_add = $pdo->prepare($insert_story_query);
        $result = $story_add->execute(
            array(
                ':story'=>$story
            )
        );
        
        if($result){
            return $msg = 'Thank you for sharing your story with us!';
        } else {
            return $msg = 'Something went wrong with the story form!';
        }

        return $msg;
    }
}

