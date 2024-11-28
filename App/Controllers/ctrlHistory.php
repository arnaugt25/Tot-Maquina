<?php

namespace App\Controllers;

class ctrlHistory {

    public function history($request, $response, $container){

        
        $response->setTemplate("history.php");

        return $response;
    }
}