<?php

class ReservationModel {

    function addReserve($date, $heure, $couverts, $id) {
        $database = new Database();
        $query = "INSERT INTO reserve (date, heure, nb_couverts, id_user) VALUES (?, ?, ?, ?)";
        return $database->executeSql($query,[$date, $heure, $couverts, $id]);
    }
}