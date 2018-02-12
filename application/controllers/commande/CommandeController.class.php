<?php

class CommandeController
{

    public function httpGetMethod(Http $http, array $formFields)
    {
        session_start();
        $mealModel = new MealModel();
        $meals = $mealModel->getAll();
        return ["meals"=>$meals];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}
