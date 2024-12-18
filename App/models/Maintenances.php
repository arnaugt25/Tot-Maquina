<?php

namespace App\Models;

class Maintenances extends Db
{
    //Añadir mantenimiento (Add maintenance)
    public function addMaintenance($data)
    {
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
            ]
        );
        return $this->sql->lastInsertId();
    }

    // SELECT para obtener todos los mantenimientos con información relacionada (SELECT to get all maintenances with related information)
    public function getMaintenances()
    {
        $query = "SELECT m.maintenance_id, m.description, m.type, m.assigned_date, m.priority,
                    u.name as technician_name, mc.machine_id as machine_id, mc.model as machine_name
                FROM maintenance m JOIN user u ON m.user_id = u.user_id
                JOIN machine mc ON m.machine_id = mc.machine_id ORDER BY m.assigned_date ASC;";
        $stmt = $this->sql->prepare($query);
        //die('hola');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // SELECT para obtener un mantenimiento específico (SELECT for specific maintenance)
    public function getMaintenanceById($maintenance_id)
    {
        $query = "SELECT m.maintenance_id, m.description, m.type, m.assigned_date, m.priority,
                             u.name as technician_name, mc.model as machine_name FROM maintenance m
                    JOIN user u ON m.user_id = u.user_id
                    JOIN machine mc ON m.machine_id = mc.machine_id
                    WHERE m.maintenance_id = :maintenance_id";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':maintenance_id' => $maintenance_id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // SELECT para obtener mantenimientos por técnico (SELECT to obtain maintenance by technician)
    public function getMaintenancesByUser($user_id)
    {
        $query = "SELECT m.maintenance_id, m.description, m.type, m.assigned_date, m.priority
                        mc.name as machine_name
                    FROM maintenance m
                    JOIN machine mc ON m.machine_id = mc.machine_id
                    WHERE m.user_id = :user_id
                    ORDER BY m.assigned_date DESC";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // SELECT para obtener mantenimientos por máquina (SELECT to obtain maintenance by machine)
    public function getMaintenancesByMachine($machine_id)
    { 
        $query = "SELECT m.maintenance_id, m.description, m.type, m.assigned_date, m.priority
                        u.name as technician_name
                    FROM maintenance m
                    JOIN user u ON m.user_id = u.user_id
                    WHERE m.machine_id = :machine_id
                    ORDER BY m.assigned_date DESC";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':machine_id' => $machine_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Editar insidencia (Edit issue)
    public function editMaintenance($data)
    {
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

    //Obtener mantenimiento por id (Get maintenance by id)
    public function getByIdMaintenance($maintenance_id)
    {
        $query = "SELECT * FROM maintenance where maintenance_id = :maintenance_id";
        $stmt = $this->sql->prepare($query);
        $stmt->bindParam(':maintenance_id', $maintenance_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    //Eliminar mantenimiento (Remove maintenance)
    public function deleteMaintenances($maintenance_id)
    {
        $query = "DELETE FROM maintenance WHERE maintenance_id = :maintenance_id";
        $stmt = $this->sql->prepare($query);
        $result = $stmt->execute([':maintenance_id' => $maintenance_id]);
        return true;
    }

    //Historial maquina (Machine history)
    public function historyMaintenance($idmaintenance)
    {
        //$query = "SELECT * FROM maintenance WHERE maintenance_id = :maintenance_id";
        $query = "SELECT m.maintenance_id, m.description, m.type, ma.installation_date,u.name, m.machine_id, ma.model 
        FROM maintenance m INNER JOIN machine ma ON m.machine_id = ma.machine_id 
        INNER JOIN user u ON u.user_id = m.user_id WHERE ma.machine_id = :machine_id";
        $stmt = $this->sql->prepare($query);
        $stmt->bindParam(':machine_id', $idmaintenance, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    //Consulta para buscar la incidencia en la base de datos (Query to search for the incident in the database)
    public function searchMaintenance($idmaintenance) {
        $query = "SELECT maintenance_id, description, assigned_date, machine_id FROM maintenance WHERE machine_id = :machine_id"; 
        $stmt = $this->sql->prepare($query);
        $stmt->bindParam(':machine_id', $idmaintenance, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

    //Consulta para buscar la incidencia en la base de datos
    public function searchMaintenance($query) {
        $searchTerm = "%{$query}%";
        $sql = "SELECT * FROM maintenance 
                WHERE maintenance_id LIKE :query 
                OR machine_id LIKE :query 
                OR user_id LIKE :query";

        $stmt = $this->sql->prepare($sql);
        $stmt->execute([':query' => $searchTerm]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}


