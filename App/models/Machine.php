<?php

namespace App\Models;

use PDO;
use PDOException;

class Machine extends Db
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    //Añadir màquina
    public function addMachine($data)
    {
        $stmt = "INSERT INTO machine (model, created_by, serial_number, installation_date, coordinates,  image ) 
                       VALUES (:model, :created_by, :serial_number, :installation_date, :coordinates, :image)";
        $stmt = $this->db->prepare($stmt);
        $result = $stmt->execute([
            ':model' => $data['model'],
            ':created_by' => $data['created_by'],
            ':serial_number' => $data['serial_number'],
            ':installation_date' => $data['installation_date'],
            ':coordinates' => $data['coordinates'],
            ':image' => $data['image']
        ]);
        return $this->db->lastInsertId();
    }

    public function listMachine()
    {
        $stmt = "SELECT * FROM machine";
        $stmt = $this->db->prepare($stmt);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }   

    public function editMachine($data)
    {
        // Si es un ID, obtener la máquina
        if (is_numeric($data)) {
            return $this->getByIdMachine($data);
        }
        // Si es un array, actualizar la máquina
        $stmt = "UPDATE machine 
                 SET model = :model, 
                     created_by = :created_by, 
                     serial_number = :serial_number, 
                     installation_date = :installation_date,
                     coordinates = :coordinates,
                     image = :image
                 WHERE machine_id = :machine_id";
        $stmt = $this->db->prepare($stmt);
        $result = $stmt->execute([
            ':machine_id' => $data['machine_id'],
            ':model' => $data['model'],
            ':created_by' => $data['created_by'],
            ':serial_number' => $data['serial_number'],
            ':installation_date' => $data['installation_date'],
            ':coordinates' => $data['coordinates'],
            ':image' => $data['image']

        ]);
        return true;
    }

    public function getByIdMachine($idmachine)
    {
        $stmt = "SELECT * FROM Machine where machine_id = :machine_id";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(':machine_id', $idmachine, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


    public function getAllMachines() {
            $stmt = "SELECT * FROM machine ORDER BY machine_id DESC";
            $stmt = $this->db->prepare($stmt);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Buscar máquina por ID
    public function getMachineById($machine_id)
    {
        $stmt = "SELECT * FROM machine WHERE machine_id = :machine_id";
        $stmt = $this->db->prepare($stmt);
        $stmt->execute([':machine_id' => $machine_id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    //Eliminar Máquina
    public function deleteMachine($machine_id)
    {
        $stmt = "DELETE FROM machine WHERE machine_id = :machine_id";
        $stmt = $this->db->prepare($stmt);
        $result = $stmt->execute([':machine_id' => $machine_id]);
        return true;
    }

    //Buscador de máquina modelo
    public function searchMachine($query) {
        $searchTerm = "%{$query}%";
        $stmt = "SELECT * FROM machine 
                WHERE model LIKE :query 
                OR serial_number LIKE :query 
                OR created_by LIKE :query";
        
        $stmt = $this->db->prepare($stmt);
        $stmt->execute([':query' => $searchTerm]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function assignTechnician($machineId, $technicianId) {
        $stmt = "UPDATE machine SET user_id = ? WHERE machine_id = ?";
        $stmt = $this->db->prepare($stmt);
        return $stmt->execute([$technicianId, $machineId]);
    }

    public function countMachinesByUserId($user_id) {
        $stmt = "SELECT COUNT(*) FROM machine WHERE user_id = :user_id";
        $stmt = $this->db->prepare($stmt);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchColumn();
    }
}