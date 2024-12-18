<?php

namespace App\Models;

use PDO;
use PDOException;

class Maintenances
{
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
                             u.name as technician_name
                      FROM maintenance m
                      JOIN user u ON m.user_id = u.user_id
                      WHERE m.machine_id = :machine_id
                      ORDER BY m.assigned_date DESC);");
        $stmt->bindParam(':machine_id', $machine_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; // Devuelve un array vacío si no hay resultados
    }

    public function editMaintenance($data)
    {

        $stmt = $this->db->prepare("UPDATE maintenance 
                 SET machine_id = :machine_id,
                     description = :description, 
                     user_id = :user_id, 
                     assigned_date = :assigned_date,
                     priority = :priority,
                     type = :type
                 WHERE maintenance_id = :maintenance_id");

        $stmt = $this->db->prepare($stmt);

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

