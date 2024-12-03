<?php

namespace App\Controllers;


class ctrlListinci {

    public function index($request, $response, $container){


        $response->setTemplate("listinci.php");

        return $response;
    }
    public function create($request, $response, $container){

        $hola = $_POST;
        //var_dump($hola);
        //die();

            $maintenanceModel = $container->get("maintenance");

            $maintenanceModel-> addMaintenance($hola);



    }
}