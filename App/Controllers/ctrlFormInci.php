<?php

namespace App\Controllers;

class ctrlFormInci {

    public function ctrlFormInci($request, $response, $container)
    {
            $machineModel = $container->get("Machine");
            $UserModel = $container->get("Users");
            //var_dump($machineModel);
            // die();
            $machines = $machineModel->listMachine();

            $Users = $UserModel->getAllTechnicians();

            $response->set('machines', $machines);
            $response->set('Users', $Users );
        $response->setTemplate("forminci.php");
        return $response;
    }
}