<?php

namespace App\Controllers;

class ctrlAddTech {
    private $userModel;
    private $machineModel;

    public function index($request, $response, $container) {
        // Obtener el modelo de máquinas
        $machineModel = $container->get("Machine");
        // Obtener todas las máquinas
        $machines = $machineModel->getAllMachines();
        
        // Obtener el modelo de usuarios
        $userModel = $container->get("Users");
        // Obtener todos los técnicos (usuarios con rol técnico)
        $technicians = $userModel->getAllTechnicians();

        // Pasar los datos a la vista
        $response->set('machines', $machines);
        $response->set('technicians', $technicians);
        
        $response->setTemplate("addtech.php");
        return $response;
    }

    public function assignTechnician($request, $response, $container) {
        header('Content-Type: application/json');
        
            $data = json_decode(file_get_contents('php://input'), true);
            $machineModel = $container->get("Machine");
            $result = $machineModel->assignTechnician($data['machine_id'], $data['technician_id']);

        return $response;
    }
}