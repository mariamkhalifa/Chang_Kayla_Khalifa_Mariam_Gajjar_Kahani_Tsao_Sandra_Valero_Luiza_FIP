<?php

    require_once '../../load.php';

    if(isset($_GET['submit'])) {
        $email = trim($_POST['email']);
        $result = subscribe($email);
    }

    echo json_encode($result);