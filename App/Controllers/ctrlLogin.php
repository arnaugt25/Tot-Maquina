<?php

namespace App\Controllers;

class ctrlLogin {

    public function login($request, $response, $container){

        
        $response->setTemplate("login.php");

        return $response;
    }
}