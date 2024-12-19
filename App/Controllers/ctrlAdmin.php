<?php

namespace App\Controllers;

class ctrlAdmin {

    //Controlador administrador (Administrator Controller)
    public function index($request, $response, $container) {
        $usersModel = $container->get("Users");
        $users = $usersModel->getAllUsers();

        $machinesModel = $container->get("Machine");
        $machines = $machinesModel->getAllMachines();

        $maintenanceModel = $container->get("Maintenances");
        $maintenances = $maintenanceModel->getMaintenances();
        
        $response->set("users", $users);
        $response->set("machines", $machines);
        $response->set("maintenances", $maintenances);
        $response->setTemplate("Admin.php");

        return $response;
    }

}