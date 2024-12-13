<?php

namespace App\Controllers;

class ctrlIndex {

    public function index($request, $response, $container){

        $machineModel = $container->get("Machine");
        $machine = $machineModel->listMachine();
        
        $response->set('machine', $machine);
        $response->setTemplate("index.php");

        return $response;
    }
}