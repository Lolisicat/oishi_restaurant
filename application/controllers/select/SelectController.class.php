<?php

class SelectController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
        $mealModel = new MealModel();
        $meal = $mealModel->getOne($queryFields);
        $http->sendJsonResponse($meal);
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }

}
