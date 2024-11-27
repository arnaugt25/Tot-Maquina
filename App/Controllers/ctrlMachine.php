<?php

namespace App\Controllers;

class ctrlMachine {

    public function machine($request, $response, $container){

        
        $response->setTemplate("maquina.php");

        return $response;
    }
}