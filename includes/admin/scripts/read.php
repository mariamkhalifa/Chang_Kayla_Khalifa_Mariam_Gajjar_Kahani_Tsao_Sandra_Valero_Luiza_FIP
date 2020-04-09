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
