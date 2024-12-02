<?php

namespace App\Controllers;

class ctrlListinci {

    public function index($request, $response, $container){


        $response->setTemplate("listinci.php");

        return $response;
    }
    public function create($request, $response, $container){
        try{
            $maintenanceModel = $container->get("Maintenance");

            $hola = $request->get(INPUT_POST, "maquina");
            print_r($hola);
            die();
            $maintenanceModel-> addMaintenance($_POST);


        }catch (\Exception $e){

        }

    }
}