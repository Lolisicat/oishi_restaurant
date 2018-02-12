<?php

class CreationController
{

    public function httpGetMethod(Http $http, array $formFields)
    {

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $firstname = $formFields["firstname"];
        $lastname = $formFields["lastname"];
        $adress = $formFields["adress"];
        $tel = $formFields["tel"];
        $log = $formFields["login"];
        $password = $formFields["password"];
        $User = new UserModel();
        $User->addUser($firstname, $lastname, $adress, $tel, $log, $password);
        if($User == false) {
            $http->redirectTo("/");
        }
        else {
            session_start();
            $_SESSION["connected"] = true;
            $http->redirectTo("/");
        }
    }
}
