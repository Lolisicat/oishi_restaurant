<?php

class OrderModel {

    function recapOrder($formFields,$id) {
        $database = new Database();
        $query = "INSERT INTO commande (id_user, date) VALUES (?, NOW())";
        $lastId = $database->executeSql($query,[$id]);


        $query = "INSERT INTO orderDetail (order_id, meal_id, quantity) VALUES (?,?,?)";
        foreach ($formFields as $form) {
            $database->executeSql($query, [$lastId, $form["id"], $form["quantity"]]);
        }

        return $lastId;
    }



}