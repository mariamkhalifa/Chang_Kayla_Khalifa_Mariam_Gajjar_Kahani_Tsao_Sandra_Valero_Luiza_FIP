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
        return '<p class="subRe">This email already signed up.</p>';
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
            return '<p class="subRe">Thank you for subscribing to our email!</p>';
        } else {
            return '<p class="subRe">Something went wrong with the subscription.</p>';
        }
    }
}

function newStory($story) {
    $pdo = Database::getInstance()->getConnection();

    $story_words = explode(' ', $story);

    // $words = array_chunk($story_words, 1);

    // $check_word = array_map('strtolower', $story_words);

    $check_word = array_change_key_case($story_words, CASE_LOWER);

    // $check_word = array(strtolower(implode($words)));

    if(in_array('fuck', $check_word) || in_array('shit', $check_word) || in_array('dick', $check_word) || in_array('bitch', $check_word) || in_array('motherfucker', $check_word)){
        return '<p class="storyRe">Please be nice when choosing words to use.</p>';
    }else{
        $insert_story_query = "INSERT INTO tbl_story (story) VALUES (:story);";
        $story_add = $pdo->prepare($insert_story_query);
        $result = $story_add->execute(
            array(
                ':story'=>$story
            )
        );
        
        if($result){
            return '<p class="storyRe">Thank you for sharing your story with us!</p>';
        } else {
            return '<p class="storyRe">Something went wrong with the story form.</p>';
        }
    }
}