<?php

    require_once '../../load.php';

    if(isset($_POST['submit'])) {
        $story = trim($_POST['story']);
        $result = newStory($story);
    }