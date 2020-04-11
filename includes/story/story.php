<?php

    require_once '../../load.php';

    if(isset($_GET['submit'])) {
        $story = trim($_POST['story']);
        $result = newStory($story);
    }

    echo json_encode($result);