<?php
require_once '../../load.php';

if(isset($_GET['hero'])) {
    $result = getAllResults('tbl_hero');
}

if(isset($_GET['hero_alt'])) {
    $result = getAllResults('tbl_hero_alt');
}

if(isset($_GET['about'])) {
    $result = getAllResults('tbl_about');
}

if(isset($_GET['video'])) {
    $result = getAllResults('tbl_video');
}

if(isset($_GET['faq'])) {
    $result = getAllResults('tbl_faq');
}

if(isset($_GET['location'])) {
    $result = getAllResults('tbl_test_location');
}

if(isset($_GET['event'])) {
    $result = getAllResults('tbl_event');
}

if(isset($_GET['instagram'])) {
    $result = getAllResults('tbl_instagram');
}

echo json_encode($result);
//echo $result;