<?php

class Model {
    private $db;
    private static $instance = null;

    private function __construct() {
        $dsn = "mysql:host=localhost;dbname=librairie";
        $login = "root";
        $password = "";

        $this->db = new PDO($dsn, $login, $password);
        $this->db->query("SET NAMES 'utf8'");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function get_model() {
        if(is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    public function get_user_from_mail($mail) {
        $reqSlq = "SELECT * FROM user WHERE mail = :mail";
        $r = $this->db->prepare($reqSlq);
        $r->bindValue(':mail', $mail, PDO::PARAM_STR);
        $r->execute();
        return $r->fetch(PDO::FETCH_OBJ);
    }

    public function new_user($mail, $password, $rank) {
        $reqSlq = "INSERT INTO user (mail, password, rank) VALUES (:mail, :password, :rank)";
        $r = $this->db->prepare($reqSlq);
        $r->bindValue(':mail', $mail, PDO::PARAM_STR);
        $r->bindValue(':password', $password, PDO::PARAM_STR);
        $r->bindValue(':rank', $rank, PDO::PARAM_STR);
        $r->execute();
        return $this->get_user_from_mail($mail);
    }
}