<?php

namespace App\Controllers;

class ctrlSearch {

    public function search($request, $response, $container){

         
        $response->setTemplate("machinelist.php");

        return $response;
    }
}