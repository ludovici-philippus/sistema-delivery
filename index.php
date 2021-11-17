<?php 
    session_start();    
    require("deliveryController.php");
    require("deliveryModel.php");

    define("INCLUDE_PATH", "http://localhost/desenvolvimento-web-tradicional/sistema-delivery/");

    $deliveryController = new deliveryController();
    $deliveryController->index();
?>