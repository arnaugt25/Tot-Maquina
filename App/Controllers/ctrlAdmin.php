<?php

namespace App\Controllers;

class ctrlAdmin {

   // Controlador
    public function index($request, $response, $container) {
        $usersModel = $container->get("Users");
        $users = $usersModel->getAllUsers();
        
        $machinesModel = $container->get("Machine");
        $machines = $machinesModel->getAllMachines();
        
        $maintenanceModel = $container->get("maintenance");
        $maintenances = $maintenanceModel->getMaintenances();
        
        $response->set("users", $users);
        $response->set("machines", $machines);
        $response->set("maintenances", $maintenances);
        $response->setTemplate("Admin.php");
        
        return $response;
    }

}