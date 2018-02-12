<?php

class ValidationModel {

    function validOrder($queryFields) {
        $id = [$queryFields["id"]];
        $database = new Database();
        $query = "SELECT * FROM orderDetail 
                  INNER JOIN commande ON orderDetail.order_id = commande.id  
                  INNER JOIN Meal ON orderDetail.meal_id = Meal.id
                  WHERE commande.id = ?";
        return $database->query($query,$id);

    }



}