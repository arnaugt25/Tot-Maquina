<?php

namespace App\Controllers;

class ctrlListm {

    public function listm($request, $response, $container){

        $response->setTemplate("machinelist.php");

        return $response;
    }
}