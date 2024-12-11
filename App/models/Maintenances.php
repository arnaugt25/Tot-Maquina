<?php

namespace App\Models;

class Maintenances extends Db
{
    public function addMaintenance($data)
    {
        try {
            $query = "INSERT INTO maintenance (description, type, assigned_date, user_id, machine_id, priority) 
                      VALUES (:description, :type, :assigned_date, :user_id, :machine_id, :priority)";
            $userId = isset($data['user_id']) && !empty($data['user_id']) ? (int)$data['user_id'] : NULL;
            $stmt = $this->sql->prepare($query);
            $stmt->execute(
                [
                    ':description' => $data['description'],
                    ':type' => $data['type'],
                    ':assigned_date' => $data['assigned_date'],
                    ':user_id' => $data['user_id'],
                    ':machine_id' => $data['machine'],
                    ':priority' => $data['priority']
                ]);
        } catch (\Exception $e) {
            error_log("Error in addMaintenance: " . $e->getMessage());
            error_log("Stack trace: " . $e->getTraceAsString());
            throw $e;  // Re-throw after logging if needed
        }
        return $this->sql->lastInsertId();
    }

    // SELECT para obtener todos los mantenimientos con información relacionada
    public function getMaintenances()
    {
        try {
            $query = "SELECT m.maintenance_id, m.description, m.type, m.assigned_date, m.priority,
                             u.name as technician_name,
                             mc.machine_id as machine_id,
                             mc.model as machine_name
                    FROM maintenance m
                    JOIN user u ON m.user_id = u.user_id
                    JOIN machine mc ON m.machine_id = mc.machine_id
                    ORDER BY m.assigned_date ASC;";


            $stmt = $this->sql->prepare($query);
            //die('hola');

            $stmt->execute();


            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            error_log("Error getting maintenances: " . $e->getMessage());
            throw new \Exception("Error al obtener los mantenimientos");
        }
    }

    // SELECT para obtener un mantenimiento específico
    public function getMaintenanceById($maintenance_id)
    {

        $query = "SELECT mc.machine_id, u.user_id, m.maintenance_id, m.description, m.type, m.assigned_date, m.priority,
                             u.name as technician_name,
                             mc.model as machine_name
                      FROM maintenance m
                      JOIN user u ON m.user_id = u.user_id
                      JOIN machine mc ON m.machine_id = mc.machine_id
                      WHERE m.maintenance_id = :maintenance_id";

        $stmt = $this->sql->prepare($query);
        $stmt->execute([':maintenance_id' => $maintenance_id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);

    }

    // SELECT para obtener mantenimientos por técnico
    public function getMaintenancesByUser($user_id)
    {
        try {
            $query = "SELECT m.maintenance_id, m.description, m.type, m.assigned_date, m.priority
                             mc.name as machine_name
                      FROM maintenance m
                      JOIN machine mc ON m.machine_id = mc.machine_id
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
    public function getMaintenancesByMachine($machine_id)
    {
        try {
            $query = "SELECT m.maintenance_id, m.description, m.type, m.assigned_date, m.priority
                             u.name as technician_name
                      FROM maintenance m
                      JOIN user u ON m.user_id = u.user_id
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

    public function editMaintenance($data)
    {
        // Si es un ID, obtener el mantenimiento
        if (is_numeric($data)) {
            return $this->getByIdMaintenances($data);
        }


        // Si es un array, actualizar la máquina
        // try {
        $query = "UPDATE maintenance 
                 SET machine_id = :machine_id,
                     description = :description, 
                     user_id = :user_id, 
                     assigned_date = :assigned_date,
                     priority = :priority,
                     type = :type
                 WHERE maintenance_id = :maintenance_id";

        $stmt = $this->sql->prepare($query);

        $result = $stmt->execute([
            ':machine_id' => $data['machine_id'],
            ':description' => $data['description'],
            ':user_id' => $data['user_id'],
            ':assigned_date' => $data['assigned_date'],
            ':priority' => $data['priority'],
            ':type' => $data['type'],
            ':maintenance_id' => $data['maintenance_id'],
        ]);
        return true;
    }
    public function getByIdMaintenance($maintenance_id)
    {
        $query = "SELECT * FROM maintenance where maintenance_id = :maintenance_id";
        $stmt = $this->sql->prepare($query);
        $stmt->bindParam(':maintenance_id', $maintenance_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function deleteMaintenances($maintenance_id) {
        $query = "DELETE FROM maintenance WHERE maintenance_id = :maintenance_id";
        $stmt = $this->sql->prepare($query);
        $result = $stmt->execute([':maintenance_id' => $maintenance_id]);
        return true;

    }

}
