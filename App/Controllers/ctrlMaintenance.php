<?php

namespace App\Controllers;

class ctrlMaintenances {

    public function Maintenances($request, $response, $container){

        
        $response->setTemplate("Maintenances.php");

        return $response;
    }
    public function create($request, $response, $container){

        $hola = $_POST;
        //var_dump($hola);
        //die();

            $maintenanceModel = $container->get("maintenance");

            $maintenanceModel-> addMaintenance($hola);

    }
    public function update($request, $response, $container) {
        $data = $request->getParsedBody(); // Asegúrate de que estás obteniendo los datos correctamente
    
        // Validar que todos los campos requeridos están presentes
        if (empty($data['maintenance_id']) || empty($data['machine_id']) || empty($data['description'])|| empty($data['user_id'])|| empty(['assigned_date'])|| empty($data['priority']) || empty($data['type'])) {
            // Manejar el error, por ejemplo, redirigir con un mensaje de error
            return $response->withRedirect('/mantenimientos/edit?id=' . $data['maintenance_id'] . '&error=Faltan campos requeridos');
        }
    
        // Llamar al modelo para actualizar el mantenimiento
        $maintenancesModel = $container->get('maintenance');
        $result = $maintenancesModel->editMaintenance($data);
    
        if ($result) {
            // Redirigir a la lista de mantenimientos o mostrar un mensaje de éxito
            return $response->withRedirect('/mantenimientos?success=Actualización exitosa');
        } else {
            // Manejar el error de actualización
            return $response->withRedirect('/mantenimientos/edit?id=' . $data['maintenance_id'] . '&error=Error al actualizar');
        }
    }
}