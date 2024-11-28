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
                echo "Mantenimiento: " . $maintenance['description'] . "<br>";
                echo "Técnico: " . $maintenance['technician_name'] . " " . $maintenance['technician_surname'] . "<br>";
                echo "Máquina: " . $maintenance['machine_name'] . "<br>";
                echo "Fecha: " . $maintenance['formatted_date'] . "<br>";
            }
            
        } catch (\Exception $e) {
            // Manejar el error
            error_log("Error en mantenimientos: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }
}
