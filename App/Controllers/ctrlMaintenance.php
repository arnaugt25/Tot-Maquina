<?php

namespace App\Controllers;

class ctrlMaintenance {
    public function index() {
        $maintenanceModel = new \App\Models\Maintenance();

        try {
            // Obtener todos los mantenimientos
            $allMaintenances = $maintenanceModel->getMaintenances();
            
            // Obtener un mantenimiento específico
            $maintenance = $maintenanceModel->getMaintenanceById($maintenance_id);
               
            // Usar los datos...
            foreach($maintenanceDetails as $maintenance) {
                echo "Descripción: " . $maintenance['description'] . "<br>";
                echo "Tipo: " . $maintenance['type'] . "<br>";
                echo "Usuario: " . $maintenance['user_id'] . "<br>";
                echo "Máquina: " . $maintenance['machine_id'] . "<br>";
                echo "Fecha: " . $maintenance['assigned_date'] . "<br>";
            }
            
        } catch (\Exception $e) {
            // Manejar el error
            error_log("Error en mantenimientos: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }
}
