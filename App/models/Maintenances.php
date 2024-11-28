<?php

namespace App\Models;

class Maintenance extends DB {
    public function addMaintenance($data) {
        try {
            $query = "INSERT INTO Maintenance (maintenance_id, description, type, assigned_date, user_id, machine_id) 
                      VALUES (:maintenance_id, :description, :type, :assigned_date, :user_id, :machine_id)";
            
            $stmt = $this->sql->prepare($query);
            $result = $stmt->execute([
                ':maintenance_id' => $data['maintenance_id'],
                ':description' => $data['description'],
                ':type' => $data['type'],
                ':assigned_date' => $data['assigned_date'],
                ':user_id' => $data['user_id'],
                ':machine_id' => $data['machine_id']
            ]);

            if (!$result) {
                throw new \Exception("Error al registrar el mantenimiento");
            }
            
            return $this->sql->lastInsertId();
            
        } catch (\PDOException $e) {
            error_log("Error registering maintenance: " . $e->getMessage());
            throw new \Exception("Error al registrar el mantenimiento");
        }
    }

    public function getMaintenanceDetails() {
        try {
            $query = "SELECT 
                        m.maintenance_id,
                    m.description,
                    m.type,
                    DATE_FORMAT(m.assigned_date, '%d-%m-%Y') as formatted_date,
                    u.name as technician_name,
                    u.surname as technician_surname,
                    mc.name as machine_name,
                    mc.machine_id
                FROM 
                    Maintenance m
                    INNER JOIN User u ON m.user_id = u.user_id
                    INNER JOIN Machine mc ON m.machine_id = mc.machine_id
                ORDER BY 
                    m.assigned_date DESC";
        
            $stmt = $this->sql->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch (\PDOException $e) {
            error_log("Error getting maintenance details: " . $e->getMessage());
            throw new \Exception("Error al obtener los detalles de mantenimiento");
    }
}
}