<?php

function getAll($tbl){
    $pdo = Database::getInstance()->getConnection();

    $queryAll = 'SELECT * FROM '.$tbl;
    $results = $pdo->query($queryAll);

    if($results){
        return $results;
    }else{
        return '<p>There was a problem accessing the info</p>';
    }
};

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

