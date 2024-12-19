<?php

namespace App\Models;

use PDO;
use PDOException;

class Maintenances
{
<<<<<<< HEAD
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
                ]
            );
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

        $query = "SELECT m.maintenance_id, m.description, m.type, m.assigned_date, m.priority,
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
=======
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function addMaintenance($data){
        $stmt = $this->db->prepare("INSERT INTO maintenance (description, type, assigned_date, user_id, machine_id, priority) VALUES (:description, :type, :assigned_date, :user_id, :machine_id, :priority)");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; // Devuelve un array vacío si no hay resultados

    }

    // SELECT para obtener todos los mantenimientos con información relacionada
    public function getMaintenances(){
        $stmt = $this->db->prepare("SELECT * FROM maintenance");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; // Devuelve un array vacío si no hay resultados
    }

    // SELECT para obtener un mantenimiento específico
    public function getMaintenanceById($maintenance_id){
        $stmt = $this->db->prepare("(SELECT m.maintenance_id, m.description, m.type, m.assigned_date, m.priority,
                             u.name as technician_name,
                             mc.model as machine_name
                      FROM maintenance m
                      JOIN user u ON m.user_id = u.user_id
                      JOIN machine mc ON m.machine_id = mc.machine_id
                      WHERE m.maintenance_id = :maintenance_id);");
        $stmt->bindParam(':maintenance_id', $maintenance_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null; // Devuelve null si no se encuentra el mantenimiento
    }

    // SELECT para obtener mantenimientos por técnico
    public function getMaintenancesByUser($user_id){
        $stmt = $this->db->prepare("(SELECT m.maintenance_id, m.description, m.type, m.assigned_date, m.priority
                             mc.name as machine_name
                      FROM maintenance m
                      JOIN machine mc ON m.machine_id = mc.machine_id
                      WHERE m.user_id = :user_id
                      ORDER BY m.assigned_date DESC);");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; // Devuelve un array vacío si no hay resultados
    }

    // SELECT para obtener mantenimientos por máquina
    public function getMaintenancesByMachine($machine_id)
    {
        $stmt = $this->db->prepare("(SELECT m.maintenance_id, m.description, m.type, m.assigned_date, m.priority
>>>>>>> c8ee088610f82ccc35b76f6944816a832c6758ed
                             u.name as technician_name
                      FROM maintenance m
                      JOIN user u ON m.user_id = u.user_id
                      WHERE m.machine_id = :machine_id
<<<<<<< HEAD
                      ORDER BY m.assigned_date DESC";

            $stmt = $this->sql->prepare($query);
            $stmt->execute([':machine_id' => $machine_id]);

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error getting machine maintenances: " . $e->getMessage());
            throw new \Exception("Error al obtener los mantenimientos de la máquina");
        }
=======
                      ORDER BY m.assigned_date DESC);");
        $stmt->bindParam(':machine_id', $machine_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; // Devuelve un array vacío si no hay resultados
>>>>>>> c8ee088610f82ccc35b76f6944816a832c6758ed
    }

    public function editMaintenance($data)
    {

<<<<<<< HEAD
        $query = "UPDATE maintenance 
=======
        $stmt = $this->db->prepare("UPDATE maintenance 
>>>>>>> c8ee088610f82ccc35b76f6944816a832c6758ed
                 SET machine_id = :machine_id,
                     description = :description, 
                     user_id = :user_id, 
                     assigned_date = :assigned_date,
                     priority = :priority,
                     type = :type
<<<<<<< HEAD
                 WHERE maintenance_id = :maintenance_id";

        $stmt = $this->sql->prepare($query);
=======
                 WHERE maintenance_id = :maintenance_id");

        $stmt = $this->db->prepare($stmt);
>>>>>>> c8ee088610f82ccc35b76f6944816a832c6758ed

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
        $stmt = $this->db->prepare("SELECT * FROM maintenance where maintenance_id = :maintenance_id");
        $stmt->bindParam(':maintenance_id', $maintenance_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null; // Devuelve null si no se encuentra el mantenimiento
    }

    public function deleteMaintenances($maintenance_id)
    {
        $stmt = $this->db->prepare("DELETE FROM maintenance WHERE maintenance_id = :maintenance_id");
        $stmt->bindParam(':maintenance_id', $maintenance_id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    public function historyMaintenance($idmaintenance)
    {
        $stmt = $this->db->prepare("SELECT m.maintenance_id, m.description, m.type, ma.installation_date,u.name, m.machine_id, ma.model 
        FROM maintenance m INNER JOIN machine ma ON m.machine_id = ma.machine_id 
        INNER JOIN user u ON u.user_id = m.user_id WHERE ma.machine_id = :machine_id");
        $stmt->bindParam(':machine_id', $idmaintenance, PDO::PARAM_INT);
        $stmt->execute();
<<<<<<< HEAD
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        //return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    //Consulta para buscar la incidencia en la base de datos
    public function searchMaintenance($idmaintenance) {
        $query = "SELECT maintenance_id, description, assigned_date, machine_id FROM maintenance WHERE machine_id = :machine_id"; 
        $stmt = $this->sql->prepare($query);
        $stmt->bindParam(':machine_id', $idmaintenance, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
=======
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; // Devuelve un array vacío si no hay resultados
    }

    //Consulta para buscar la incidencia en la base de datos
    public function searchMaintenance($query) {
        $searchTerm = "%{$query}%";
        $stmt = $this->db->prepare("SELECT * FROM maintenance 
                WHERE maintenance_id LIKE :query 
                OR machine_id LIKE :query 
                OR user_id LIKE :query");
        $stmt->bindParam(':query', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; // Devuelve un array vacío si no hay resultados
    }
    }

>>>>>>> c8ee088610f82ccc35b76f6944816a832c6758ed
