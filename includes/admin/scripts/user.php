<?php

function createUser($fname, $username, $email, $ip, $reqtime){

    $pdo = Database::getInstance()->getConnection();

    // check existance  SELECT * FROM "tbl_user" WHERE "user_name" =' .$username 'AND "user_pass" =' .$password
    $check_exist_query = 'SELECT COUNT(*) FROM `tbl_user` WHERE user_name =:username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
    );

    if($user_set->fetchColumn()>0){
        return '<p>user already exist</p>';
    }else{
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $password = substr(str_shuffle($data), 0, 8);
        $hashP = password_hash($password, PASSWORD_DEFAULT);
        
        $insert_new_query = "INSERT INTO tbl_user (user_fname, user_name, user_pass, user_email, user_lastlogin, user_ip, user_locked, user_attempts, user_new, user_newstart, user_sus) VALUES (:fname, :username, :password, :email, :lastlogin, :ip, :nolock, :zero_attempts, :new, :newstart, :nosus);";
        $user_add = $pdo->prepare($insert_new_query);
        $create_user_result = $user_add->execute(
            array(
                'fname'=>$fname,
                ':username'=>$username,
                ':password'=>$hashP,
                ':email'=>$email,
                ':lastlogin'=>$reqtime,
                ':ip'=>$ip,
                ':nolock'=>"NO",
                ':zero_attempts'=>"0",
                ':new'=>"N",
                ':newstart'=>$reqtime,
                ':nosus'=>"NO"
            )
        );
        

        if($create_user_result){
            $recipient = $email;
            $subject = "Hello, welcome to Login Research.";
            $message = '<html><body>';
            $message .= '<h2>Welcome!</h2>';
            $message .= '<p>We are happy to have you.</p>';
            $message .= '<p>Your account has been created as the information below:</p>';
            $message .= '<p>Username: </p>' .$username;
            $message .= '<p>Password: </p>' .$password;
            $message .= '<p>Reset your password: <a href="http://localhost/Tsao_S_Valero_L_3014_research/admin/index.php" >Reset</a></p>';
            $message .= '<p>You have 24 hours to login and set up the account.</p>';
            $message .= '<p>Have a wonderful day.</p>';
            $message .= '<h5>Sincerely,</h5>';
            $message .= '<h5>Login Research</h5>';
            $message .= '</body></html>';
            $from = "noreply@loginresearch.ca";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html'. "\r\n";
            $headers .= 'From: '.$from."\r\n";
            $headers .= 'Reply-To: '.$fname. '<'.$email.'>' . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            
            mail($recipient, $subject, $message, $headers);
            // if(mail($recipient, $subject, $message, $headers)){
            //     return '<p>You have signed up sucessfully! Go back to <a href="index.php">dashboard</a></p>';
            // }else{
            //     // return $mail_sent;
            //     return '<p>Sorry, something was wrong with the email address! Head back to <a href="index.php">dashboard</a></p>';
            // }   
            // return '<p>You have created the account sucessfully!</p>';
            // $_SESSION['created'] = '<p class="actions">You have created the account sucessfully!</p>';
            redirect_to('index.php?create=You have created the account sucessfully!');
            // redirect_to('index.php');

        } else {
            return '<p>Something went wrong with the information.</p>';
        }
    }

}

function getSingleUser($id){
    $pdo = Database::getInstance()->getConnection();

    $get_single_query = 'SELECT * FROM `tbl_user` WHERE user_id =:id';
    $user_get = $pdo->prepare($get_single_query);
    $user_single = $user_get->execute(
        array(
            ':id'=>$id
        )
    );

    if($user_single && $user_get->rowCount()){
        return $user_get;
    }else{
        return false;
    }

    // echo $user_get->debugDumpParams();
    // exit;

    // while($founduser = $user_get->fetch(PDO::FETCH_ASSOC)){
    //     $newuser = $founduser['user_new'];
    //     if($newuser === "N"){
    //         $get_new_query = 'SELECT user_fname, user_name, user_email FROM `tbl_user` WHERE user_id =:id';
    //         $user_new = $pdo->prepare($get_new_query);
    //         $got_new = $user_new->execute(
    //             array(
    //                 ':id'=>$id
    //             )
    //         );
    //         if($got_new && $user_new->rowCount()){
    //             return $user_new;
    //         }else{
    //             return false;
    //         }
    //     }else{
    //         $get_old_query = 'SELECT * FROM `tbl_user` WHERE user_id =:id';
    //         $user_old = $pdo->prepare($get_old_query);
    //         $got_old = $user_old->execute(
    //             array(
    //                 ':id'=>$id
    //             )
    //         );
    //         if($got_old && $user_old->rowCount()){
    //             return $user_old;
    //         }else{
    //             return false;
    //         }
    //     }
    // }
}

function editUser($id, $fname, $username, $password, $email){
    $pdo = Database::getInstance()->getConnection();

    $get_info_query = 'SELECT * FROM `tbl_user` WHERE user_id =:id';
    $user_got = $pdo->prepare($get_info_query);
    $user_got->execute(
        array(
            ':id'=>$id
        )
    );

    while($founduser = $user_got->fetch(PDO::FETCH_ASSOC)){
        $newuser = $founduser['user_new'];
        $hashedP = password_hash($password, PASSWORD_DEFAULT);
        $hash = $founduser['user_pass'];
        $hashed = substr( $hash, 0, 60 );
        $usersus = $founduser['user_sus'];
        if($newuser === "N"){
            if($password == $hashed){
                return "<p>Please use a different password.</p>";
            }else{
                $update_first_time = 'UPDATE `tbl_user` SET user_fname =:fname, user_name =:username, user_pass =:password, user_email =:email, user_new =:old, user_sus =:nosus WHERE user_id =:id';
                $first_set = $pdo->prepare($update_first_time);
                $updated_first = $first_set->execute(
                    array(
                        ':old'=>"O",
                        ':fname'=>$fname,
                        ':username'=>$username,
                        ':password'=>$hashedP,
                        ':email'=>$email,
                        ':nosus'=>"NO",
                        ':id'=>$id
                    )
                );
                if($updated_first){
                    // $_SESSION['set'] = '<p class="actions">You have set up the account sucessfully!</p>';
                    redirect_to('index.php?set=You have set up the account sucessfully!');
                    // redirect_to('index.php');
                    // return '<p>You have signed up sucessfully! Please log in again.</p>';
                }else{
                    return 'Something went wrong with the update.';
                }
            }
        }else{
            if($password == $hashed){
                $update_user_query = 'UPDATE `tbl_user` SET user_fname =:fname, user_name =:username, user_pass =:password, user_email =:email WHERE user_id =:id';
                $single_update = $pdo->prepare($update_user_query);
                $updated_single = $single_update->execute(
                    array(
                        ':fname'=>$fname,
                        ':username'=>$username,
                        ':password'=>$password,
                        ':email'=>$email,
                        ':id'=>$id
                    )
                );
                if($updated_single){
                    // $_SESSION['edited'] = '<p class="actions">You have edited the account sucessfully!</p>';
                    redirect_to('index.php?edit=You have edited the account sucessfully!');
                    // return '<p>You have updated sucessfully!</p>';
                }else{
                    return 'Something went wrong with the update.';
                }
            }else{
                $update_user_query = 'UPDATE `tbl_user` SET user_fname =:fname, user_name =:username, user_pass =:password, user_email =:email WHERE user_id =:id';
                $single_update = $pdo->prepare($update_user_query);
                $updated_single = $single_update->execute(
                    array(
                        ':fname'=>$fname,
                        ':username'=>$username,
                        ':password'=>$hashedP,
                        ':email'=>$email,
                        ':id'=>$id
                    )
                );
                if($updated_single){
                    // redirect_to('index.php');
                    redirect_to('index.php?edit=You have edited the account sucessfully!');
                    // return '<p>You have updated sucessfully!</p>';
                }else{
                    return 'Something went wrong with the update.';
                }
            }
        }
    }
}

function getAllUsers(){
    $pdo = Database::getInstance()->getConnection();

    $get_user_query = 'SELECT * FROM tbl_user';
    $users = $pdo->query($get_user_query);

    if($users){
        return $users;
    }else{
        return false;
    }
}

function deleteUser($user_id, $currentId){
    if($user_id == $currentId){
        return '<p>Cannot delete yourself.</p>';
    }else{
        $pdo = Database::getInstance()->getConnection();
        $delete_user_query = 'DELETE FROM tbl_user WHERE user_id = :id';
        $delete_user_set = $pdo->prepare($delete_user_query);
        $delete_user_result = $delete_user_set->execute(
            array(
                ':id'=>$user_id
            )
        );
    
        //If everything went through, redirect to admin_deleteuser.php
        //Otherwise, return false
        if($delete_user_result && $delete_user_set->rowCount() > 0){
            redirect_to('admin_delete_user.php?delete=You have deleted the user sucessfully.');
        }else{
            return false;
        }
    }
}