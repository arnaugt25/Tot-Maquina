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
            
            // Obtener mantenimientos por técnico
            $technicianMaintenances = $maintenanceModel->getMaintenancesByUser($user_id);
            
            // Obtener mantenimientos por máquina
            $machineMaintenances = $maintenanceModel->getMaintenancesByMachine($machine_id);
            
        } catch (\Exception $e) {
            // Manejar el error
            error_log("Error en mantenimientos: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }
}
