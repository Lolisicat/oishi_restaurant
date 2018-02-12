<?php

class BasketController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
    }
    public function httpPostMethod(Http $http, array $formFields)
    {
        session_start();
        $order = new OrderModel();
        $orderId = $order->recapOrder($formFields["orders"],$_SESSION["id"]);
        $http->sendJsonResponse($orderId);
    }
}