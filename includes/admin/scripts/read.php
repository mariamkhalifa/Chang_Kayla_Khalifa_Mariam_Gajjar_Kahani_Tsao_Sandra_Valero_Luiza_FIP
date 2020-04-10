<?php

function getAllResults($tbl) {
    $pdo = Database::getInstance()->getConnection();

    $get_all_query = 'SELECT * FROM ' .$tbl;
    $get_all_set = $pdo->query($get_all_query);
    $result = $get_all_set->execute();

    $result = array();

        while($row = $get_all_set->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
}