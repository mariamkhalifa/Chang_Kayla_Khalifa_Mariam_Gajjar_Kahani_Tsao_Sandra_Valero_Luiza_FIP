<?php

    require_once '../../load.php';

    if(isset($_POST['submit'])) {
        $email = trim($_POST['email']);
        $result = subscribe($email);
    }