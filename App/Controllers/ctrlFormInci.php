<?php

namespace App\Controllers;

class ctrlFormInci {

    public function forminci($request, $response, $container)
    {

        try {
            $machineModel = $container->get("Machine");
            $UserModel = $container->get("Users");
             //var_dump($machineModel);
            // die();
            $machines = $machineModel->listMachine();

            $Users = $UserModel->getAllTechnicians();

            $response->set('machines', $machines);
            $response->set('Users', $Users );

        } catch (\Exception $e) {
            $response->setSession("error", $e->getMessage());
            $response->redirect("Location: /list");
        }

        $response->setTemplate("forminci.php");
        return $response;
    }
}