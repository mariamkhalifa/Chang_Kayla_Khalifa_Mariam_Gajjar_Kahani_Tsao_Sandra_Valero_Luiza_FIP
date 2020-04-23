<?php
require_once '../../load.php';

// home page

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

if(isset($_GET['faqintro'])) {
    $result = getAllResults('tbl_faqintro');
}

if(isset($_GET['faq'])) {
    $result = getAllResults('tbl_faq');
}

if(isset($_GET['locationintro'])) {
    $result = getAllResults('tbl_locationsintro');
}

if(isset($_GET['location'])) {
    $result = getAllResults('tbl_test_location');
}

// facts page

if(isset($_GET['factslinks'])) {
    $result = getAllResults('tbl_factslinks');
}

if(isset($_GET['infolinksdata'])) {
    $result = getAllResults('tbl_infolinksdata');
}

if(isset($_GET['factsmore'])) {
    $result = getAllResults('tbl_factsmore');
}

// community page

if(isset($_GET['communityintro'])) {
    $result = getAllResults('tbl_communityintro');
}

if(isset($_GET['eventsheading'])) {
    $result = getAllResults('tbl_eventsheading');
}

if(isset($_GET['event'])) {
    $result = getAllResults('tbl_event');
}

if(isset($_GET['instagramfeed'])) {
    $result = getAllResults('tbl_instagramfeed');
}

if(isset($_GET['instagram'])) {
    $result = getAllResults('tbl_instagram');
}

if(isset($_GET['story'])) {
    $result = getAllResults('tbl_storyintro');
}

if(isset($_GET['helplines'])) {
    $result = getAllResults('tbl_helplines');
}

// contact page

if(isset($_GET['contactintro'])) {
    $result = getAllResults('tbl_contactintro');
}

if(isset($_GET['contactformlabels'])) {
    $result = getAllResults('tbl_formlabels');
}

if(isset($_GET['socialmedia'])) {
    $result = getAllResults('tbl_socialmedia');
}

if(isset($_GET['contactinfo'])) {
    $result = getAllResults('tbl_contactinfo');
}


echo json_encode($result);
//echo $result;