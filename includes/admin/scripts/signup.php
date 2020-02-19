<?php
function signup($username, $password, $ip, $reqtime){
    // return sprintf('You are logging in with username=>%s, password=>%s', $username, $password);

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
        return '<p>user already exist</p>
            <p>please go to <a href="admin_login.php">Login Page</a></p>
        ';
    }else{
        $insert_new_query = "INSERT INTO tbl_user (user_name, user_pass, user_lastlogin, user_ip, user_attempt, user_lock) VALUES (:username, :password, :lastlogin, :ip, :zero_attempts, :nolock);";
        $user_add = $pdo->prepare($insert_new_query);
        $user_add->execute(
            array(
                ':username'=>$username,
                ':password'=>$password,
                ':lastlogin'=>$reqtime,
                ':ip'=>$ip,
                ':zero_attempts'=>"0",
                ':nolock'=>"NO"
            )
        );
        redirect_to('index.php');
        return '<p>Successfully signed up!</p>';
    }

}