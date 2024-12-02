<?php

namespace App\Models;

class Maintenances extends DB {
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

    // SELECT para obtener todos los mantenimientos con información relacionada
    public function getMaintenances() {
        try {
            $query = "SELECT m.maintenance_id, m.description, m.type, m.assigned_date,
                             u.name as technician_name,
                             mc.name as machine_name
                      FROM Maintenance m
                      JOIN User u ON m.user_id = u.user_id
                      JOIN Machine mc ON m.machine_id = mc.machine_id
                      ORDER BY m.assigned_date DESC";
            
            $stmt = $this->sql->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch (\PDOException $e) {
            error_log("Error getting maintenances: " . $e->getMessage());
            throw new \Exception("Error al obtener los mantenimientos");
        }
    }

    // SELECT para obtener un mantenimiento específico
    public function getMaintenanceById($maintenance_id) {
        try {
            $query = "SELECT m.maintenance_id, m.description, m.type, m.assigned_date,
                             u.name as technician_name,
                             mc.name as machine_name
                      FROM Maintenance m
                      JOIN User u ON m.user_id = u.user_id
                      JOIN Machine mc ON m.machine_id = mc.machine_id
                      WHERE m.maintenance_id = :maintenance_id";
            
            $stmt = $this->sql->prepare($query);
            $stmt->execute([':maintenance_id' => $maintenance_id]);
            
            return $stmt->fetch(\PDO::FETCH_ASSOC);
            
        } catch (\PDOException $e) {
            error_log("Error getting maintenance: " . $e->getMessage());
            throw new \Exception("Error al obtener el mantenimiento");
        }
    }

    // SELECT para obtener mantenimientos por técnico
    public function getMaintenancesByUser($user_id) {
        try {
            $query = "SELECT m.maintenance_id, m.description, m.type, m.assigned_date,
                             mc.name as machine_name
                      FROM Maintenance m
                      JOIN Machine mc ON m.machine_id = mc.machine_id
                      WHERE m.user_id = :user_id
                      ORDER BY m.assigned_date DESC";
            
            $stmt = $this->sql->prepare($query);
            $stmt->execute([':user_id' => $user_id]);
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch (\PDOException $e) {
            error_log("Error getting user maintenances: " . $e->getMessage());
            throw new \Exception("Error al obtener los mantenimientos del técnico");
        }
    }

    // SELECT para obtener mantenimientos por máquina
    public function getMaintenancesByMachine($machine_id) {
        try {
            $query = "SELECT m.maintenance_id, m.description, m.type, m.assigned_date,
                             u.name as technician_name
                      FROM Maintenance m
                      JOIN User u ON m.user_id = u.user_id
                      WHERE m.machine_id = :machine_id
                      ORDER BY m.assigned_date DESC";
            
            $stmt = $this->sql->prepare($query);
            $stmt->execute([':machine_id' => $machine_id]);
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch (\PDOException $e) {
            error_log("Error getting machine maintenances: " . $e->getMessage());
            throw new \Exception("Error al obtener los mantenimientos de la máquina");
        }
    }
}