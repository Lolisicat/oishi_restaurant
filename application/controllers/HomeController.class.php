<?php

class HomeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
        $mealModel = new MealModel();
    	$meals = $mealModel->getAll();
    	return ["meals"=>$meals]; /*envoie à la view phtml*/
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
    }
}