<?php

namespace App\Controllers;

class ctrlAdmin {

    public function index($request, $response, $container){


        $response->setTemplate("Admin.php");

        return $response;
    }
}