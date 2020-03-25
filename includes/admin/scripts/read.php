<?php

function greeting() {
    $nowtime = date("G");
    if($nowtime <= 10 && $nowtime >= 0){
        return 'Good morning';
    }else if($nowtime >= 11 && $nowtime <= 17){
        return 'Good afternoon';
    }else{
        return 'Good evening';
    }
}

function getHero($tbl_home) {

    $pdo = Database::getInstance()->getConnection();

    $queryHero1 = 'SELECT * FROM ' . $tbl_home . ' WHERE ID =:id';
    $hero1 = $pdo->prepare($queryHero1);
    $hero1->execute(
        array(
            ':id'=>"1"
        )
    );

    if($hero1){
        return $hero1;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
};


function getTest($tbl_home) {

    $pdo = Database::getInstance()->getConnection();

    $queryTest = 'SELECT test_place, test_address, test_address_2 FROM ' . $tbl_home . ' WHERE ID IN(:one, :two, :three)';
    $test = $pdo->prepare($queryTest);
    $test->execute(
        array(
            ':one'=>"1",
            ':two'=>"2",
            ':three'=>"3"
        )
    );

    if($test){
        return $test;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
};

function getHero2($tbl_home) {

    $pdo = Database::getInstance()->getConnection();

    $queryHero2 = 'SELECT * FROM ' . $tbl_home . ' WHERE ID =:id';
    $hero2 = $pdo->prepare($queryHero2);
    $hero2->execute(
        array(
            ':id'=>"2"
        )
    );

    if($hero2){
        return $hero2;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
};

function getHero3($tbl_home) {

    $pdo = Database::getInstance()->getConnection();

    $queryHero3 = 'SELECT * FROM ' . $tbl_home . ' WHERE ID =:id';
    $hero3 = $pdo->prepare($queryHero3);
    $hero3->execute(
        array(
            ':id'=>"3"
        )
    );

    if($hero3){
        return $hero3;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
};

function getHero4($tbl_home) {

    $pdo = Database::getInstance()->getConnection();

    $queryHero4 = 'SELECT * FROM ' . $tbl_home . ' WHERE ID =:id';
    $hero4 = $pdo->prepare($queryHero4);
    $hero4->execute(
        array(
            ':id'=>"4"
        )
    );

    if($hero4){
        return $hero4;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
};

function getHero5($tbl_home) {

    $pdo = Database::getInstance()->getConnection();

    $queryHero5 = 'SELECT * FROM ' . $tbl_home . ' WHERE ID =:id';
    $hero5 = $pdo->prepare($queryHero5);
    $hero5->execute(
        array(
            ':id'=>"5"
        )
    );

    if($hero5){
        return $hero5;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
};

function getHero6($tbl_home) {

    $pdo = Database::getInstance()->getConnection();

    $queryHero6 = 'SELECT * FROM ' . $tbl_home . ' WHERE ID =:id';
    $hero6 = $pdo->prepare($queryHero6);
    $hero6->execute(
        array(
            ':id'=>"6"
        )
    );

    if($hero6){
        return $hero6;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
};

function getFaq($tbl_home, $tbl_faq) {

    $pdo = Database::getInstance()->getConnection();

    $queryHero = 'SELECT * FROM ' . $tbl_home . ' WHERE ID =:id';
    $hero = $pdo->prepare($queryHero);
    $hero->execute(
        array(
            ':id'=>"1"
        )
    );
    while($founduser = $hero->fetch(PDO::FETCH_ASSOC)){
        $faq1 = $founduser['faq_1'];
        $faq2 = $founduser['faq_2'];
        
        $get_faq = 'SELECT * FROM ' .$tbl_faq. ' WHERE ID IN(:faq1, :faq2)';
        $got_faq = $pdo->prepare($get_faq);
        $got_faq->execute(
            array(
                ':faq1'=>$faq1,
                ':faq2'=>$faq2
            )
        );
    }

    if($got_faq){
        // echo $got_faq->debugDumpParams();
        // exit;
        return $got_faq;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
};

function getEvents($tbl_commu) {

    $pdo = Database::getInstance()->getConnection();

    $queryEvent = 'SELECT * FROM ' . $tbl_commu;
    $event = $pdo->query($queryEvent);

    if($event){
        return $event;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
};
