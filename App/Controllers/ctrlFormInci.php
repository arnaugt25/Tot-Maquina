<?php

namespace App\Controllers;

class ctrlFormInci {

    public function forminci($request, $response, $container)
    {

        try {
            $machineModel = $container->get("Machine");
            $technicianModel = $container->get("Technician");
             //var_dump($machineModel);
            // die();
            $machines = $machineModel->listMachine();

            $technicians = $technicianModel->getallTechnician();

            $response->set('machines', $machines);
            $response->set('technicians', $technicians);

        } catch (\Exception $e) {
            $response->setSession("error", $e->getMessage());
            $response->redirect("Location: /list");
        }

        $response->setTemplate("forminci.php");
        return $response;
    }
}