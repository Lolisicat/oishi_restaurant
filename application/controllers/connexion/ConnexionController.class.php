<?php

class ConnexionController //$http = header, $formFields = $_GET ou $_POST
{

    public function httpGetMethod(Http $http, array $formFields)
    {

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $log = $formFields["login"];
        $password = $formFields["password"];
        $UserModel = new UserModel();
        $user = $UserModel->getUser($log, $password);

        if($user == false) {
            $message = "Hum... Essaie encore";

        }
        else {
            session_start();
            $_SESSION["connected"] = true;
            $_SESSION["rang"] = $user["ranked"];
            $_SESSION["id"] = $user["id"];
            $_SESSION["prenom"] = $user["firstName"];
            $_SESSION["nom"] = $user["lastName"];
            $_SESSION["adress"] = $user["adress"];
            $_SESSION["phone"] = $user["phoneNumber"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["ty"] = false;
            $http->redirectTo("/");
        }
    }
}