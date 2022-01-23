<?php


class profileController {
    private PDO $pdo;

    public function __construct ($pdo){
        $this->pdo = $pdo;
    }

    // when request profile verify suit
    // pass "ref" as param, compare user on line & ref to allowed profile
    public function allowed ($ref){
//        $idRef = $ref -> get id
//        if($_SESSION['user']['id'] === $idRef)
    }

    // userManager Methode compose profile
    // if session exist &( if user role = admin or if it's my session)

    //if(isset($_SESSION['user']) &&
    //($_SESSION['user']['role'] == 1 || $_SESSION['user']['id']) == $ref)


}