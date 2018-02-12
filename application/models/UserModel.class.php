<?php

class UserModel {

    function getUser($log, $pass) {
        $database = new Database();
        $query = "SELECT * FROM users WHERE email = ? AND password = ?";
        return $database->queryOne($query,[$log,$pass]);
    }

    function addUser($firstname, $lastname, $adress, $tel, $log, $password) {
        $database = new Database();
        $query = "INSERT INTO users (firstName, lastName, adress, phoneNumber, email, password) VALUES (?, ?, ?, ?, ?, ?)";
        return $database->executeSql($query,[$firstname, $lastname, $adress, $tel, $log, $password]);
    }
}