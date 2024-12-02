<?php

namespace App\Controllers;

class ctrlAdmin {

   // Controlador
    public function index($request, $response, $container) {
        $usersModel = $container->get("Users");
        $users = $usersModel->getAllUsers();
        
        $machinesModel = $container->get("Machines");
        $machines = $machinesModel->getAllMachines();
        
        $response->set("users", $users);
        $response->set("machines", $machines);
        $response->setTemplate("Admin.php");
        
        return $response;
    }

}