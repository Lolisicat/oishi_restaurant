<?php

class MealModel {

function getAll() {
    $database = new Database();
    $query = "SELECT * FROM Meal";
    return $database->query($query);
}

function getOne($queryFields) {
    $id = [$queryFields["id"]];
    $database = new Database();
    $query = "SELECT * FROM Meal WHERE id = ?";
    return $database->queryOne($query,$id);
}

}