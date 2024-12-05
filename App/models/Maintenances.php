<?php

namespace App\Models;

class Maintenances extends Db {

    public function addMaintenance($data){
        try {
            // Validar que todos los campos requeridos existen
            $required_fields = ['description', 'type', 'assigned_date', 'user_id', 'machine_id', 'priority'];
            foreach ($required_fields as $field) {
                if (!isset($data[$field])) {
                    throw new \Exception("Campo requerido faltante: {$field}");
                }
            }

            $query = "INSERT INTO maintenance (description, type, assigned_date, user_id, machine_id, priority ) 
                       VALUES (:description, :type, :assigned_date, :user_id, :machine_id, :priority)";
            $stmt = $this->sql->prepare($query);
            $result = $stmt->execute([
                ':description' => $data['description'],
                ':type' => $data['type'],
                ':assigned_date' => $data['assigned_date'],
                ':user_id' => $data['user_id'],
                ':machine_id' => $data['machine_id'],
                ':priority' => $data['priority']
            ]);
            if (!$result) {
                throw new \Exception("Error al añadir un mantenimiento");
            }
            return $this->sql->lastInsertId();
        } catch (\PDOException $e) {
            error_log("Error registering maintenance: " . $e->getMessage());
            throw new \Exception("Error al añadir un mantenimiento");
        }
    }

    public function listMaintenance(){
        try {
        $query = "SELECT * FROM maintenance";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
        error_log("Error getting maintenances: " . $e->getMessage());
        throw new \Exception("Error al obtener los mantenimientos");
    }
}
}