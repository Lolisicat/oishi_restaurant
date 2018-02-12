<?php

class ValidationController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
        $validation = new ValidationModel();
        $valid = $validation->validOrder($queryFields);
        return ["valid"=>$valid];
    }
    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}