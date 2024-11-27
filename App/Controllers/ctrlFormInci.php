<?php

namespace App\Controllers;

class ctrlFormInci {

    public function index($request, $response, $container){


        $response->setTemplate("forminci.php");

        return $response;
    }
}