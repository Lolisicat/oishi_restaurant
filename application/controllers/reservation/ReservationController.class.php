<?php

class ReservationController
{

    public function httpGetMethod(Http $http, array $formFields)
    {
        session_start();
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        session_start();
        $date = $formFields["date"];
        $heure = $formFields["heure"];
        $couverts = $formFields["couverts"];
        $id = $_SESSION["id"];
        $reserve = new ReservationModel();
        $user = $reserve->addReserve($date, $heure, $couverts, $id);
        if ($user == true AND isset($_SESSION)) {
            $_SESSION["ty"] = true;
            $http->redirectTo("/reservation");
        }
        else {
            $http->redirectTo("/creation");
        }
    }
}
