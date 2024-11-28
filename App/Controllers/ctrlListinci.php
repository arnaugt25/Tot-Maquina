<?php

namespace App\Controllers;

class ctrlListinci {

    public function index($request, $response, $container){


        $response->setTemplate("listinci.php");

        return $response;
    }
}