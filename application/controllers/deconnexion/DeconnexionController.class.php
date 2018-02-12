<?php

class DeconnexionController
{

    public function httpGetMethod(Http $http, array $formFields)
    {
        session_start();
        session_destroy();
        unset($_SESSION);
        $http->redirectTo("/");
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}