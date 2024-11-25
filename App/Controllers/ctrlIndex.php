<?php

namespace App\Controllers;

class ctrlIndex {

    public function index($request, $response, $container){

        
        $response->setTemplate("index.php");

        return $response;
    }
}