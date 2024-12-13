<?php

namespace App\Models;

use PDO;

class Machine {
    protected $sql;
    
    public function __construct($user, $pass, $db, $host) {
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $this->sql = new PDO($dsn, $user, $pass);
    }

    public function addMachine($data)
    {
        $query = "INSERT INTO machine (model, created_by, serial_number, installation_date, coordinates,  image ) 

                       VALUES (:model, :created_by, :serial_number, :installation_date, :coordinates, :image)";
        //     var_dump($query);
        //    die();
        $stmt = $this->sql->prepare($query);
        $result = $stmt->execute([
            ':model' => $data['model'],
            ':created_by' => $data['created_by'],
            ':serial_number' => $data['serial_number'],
            ':installation_date' => $data['installation_date'],
            ':coordinates' => $data['coordinates'],
            ':image' => $data['image']
        ]);
        //  var_dump($result);
        //  die();
        return $this->sql->lastInsertId();
    }

    public function listMachine()
    {
        $query = "SELECT * FROM machine";
        // var_dump($query);
        // die();
        $stmt = $this->sql->prepare($query);
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
        // try {
        $query = "UPDATE machine 
                 SET model = :model, 
                     created_by = :created_by, 
                     serial_number = :serial_number, 
                     installation_date = :installation_date,
                     coordinates = :coordinates,
                     image = :image
                 WHERE machine_id = :machine_id";

        $stmt = $this->sql->prepare($query);
        // var_dump($data);
        // die();
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
        $query = "SELECT * FROM Machine where machine_id = :machine_id";
        $stmt = $this->sql->prepare($query);
        $stmt->bindParam(':machine_id', $idmachine, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


    // public function listMachine()
    // {
    //     try {
    //         $query = "SELECT * FROM machine";
    //         // var_dump($query);
    //         // die();
    //         $stmt = $this->sql->prepare($query);
    //         $stmt->execute();
    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    //     } catch (\PDOException $e) {
    //         error_log("Error getting machines: " . $e->getMessage());
    //         throw new \Exception("Error al obtener las máquinas");
    //     }
    // }


    public function getAllMachines() {
        try {
            $query = "SELECT * FROM machine ORDER BY machine_id DESC";
            $stmt = $this->sql->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error getting machines: " . $e->getMessage());
            throw new \Exception("Error al obtener las máquinas");
        }
        try {
            $query = "SELECT machine_id, model FROM machine ORDER BY model";
            $stmt = $this->sql->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error getting machines: " . $e->getMessage());
            throw new \Exception("Error al obtener las máquinas");
        }

        $query = "SELECT * FROM machine ORDER BY machine_id DESC";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    //Buscar máquina por ID
    public function getMachineById($machine_id)
    {
        $query = "SELECT * FROM machine WHERE machine_id = :machine_id";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':machine_id' => $machine_id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    //Eliminar Máquina
    public function deleteMachine($machine_id)
    {
        $query = "DELETE FROM machine WHERE machine_id = :machine_id";
        $stmt = $this->sql->prepare($query);
        $result = $stmt->execute([':machine_id' => $machine_id]);
        return true;
    }


    //Buscador de máquina modelo
    public function searchMachine($query) {
        $searchTerm = "%{$query}%";
        $sql = "SELECT * FROM machine 
                WHERE model LIKE :query 
                OR serial_number LIKE :query 
                OR created_by LIKE :query";
        
        $stmt = $this->sql->prepare($sql);
        $stmt->execute([':query' => $searchTerm]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}