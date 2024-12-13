<?php

namespace App\Controllers;

class ctrlIndex {

    public function index($request, $response, $container){

        $machineModel = $container->get("Machine");
        $machines = $machineModel->listMachine();
        
        $response->set('machines', $machines);
        $response->setTemplate("index.php");

        return $response;
    }
}