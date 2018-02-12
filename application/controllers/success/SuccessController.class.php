<?php

class SuccessController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
    }
    public function httpPostMethod(Http $http, array $formFields)
    {
        session_start();
        $http->redirectTo("/success");
    }
}