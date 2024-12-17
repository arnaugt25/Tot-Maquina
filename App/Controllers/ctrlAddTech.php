<?php

namespace App\Controllers;

class ctrlAddTech {
    private $userModel;
    private $machineModel;

    public function index($request, $response, $container) {
        // Obtener el modelo de máquinas (Get the machine model)
        $machineModel = $container->get("Machine");
        // Obtener todas las máquinas (Get all machines)
        $machines = $machineModel->getAllMachines();
        // Obtener el modelo de usuarios (Get the user model)
        $userModel = $container->get("Users");
        // Obtener todos los técnicos (usuarios con rol técnico) (Get all technicians (users with technician role))
        $technicians = $userModel->getAllTechnicians();

        // Pasar los datos a la vista (Passing data to the view)
        $response->set('machines', $machines);
        $response->set('technicians', $technicians);
        
        $response->setTemplate("addtech.php");
        return $response;
    }

    //Assignar tecnicos (Assign technicians)
    public function assignTechnician($request, $response, $container) {
        header('Content-Type: application/json');

        // try {

            $data = json_decode(file_get_contents('php://input'), true);
            $machineModel = $container->get("Machine");
            $result = $machineModel->assignTechnician($data['machine_id'], $data['technician_id']);

            
            echo json_encode([
                'success' => $result,
                'message' => $result ? 'Técnico asignado correctamente' : 'Error en la asignación'
            ]);
        // } catch (\Exception $e) {
        //     http_response_code(400);
        //     echo json_encode([
        //         'success' => false,
        //         'message' => $e->getMessage()
        //     ]);
        // }

        return $response;
    }
}