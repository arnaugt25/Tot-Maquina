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
}