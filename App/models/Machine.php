<?php

namespace App\Models;

class Machine extends db
{

    public function addMachine($data)
    {
        // try {
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
        if (!$result) {
            throw new \Exception("Error al añadir una máquina");
        }
        return $this->sql->lastInsertId();
        // } catch (\PDOException $e) {
        //     error_log("Error registering maintenance: " . $e->getMessage());
        //     throw new \Exception("Error al añadir una máquina");
        // }
    }

    public function listMachine()
    {
        // try {
            $query = "SELECT * FROM machine";
            // var_dump($query);
            // die();
            $stmt = $this->sql->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        // } catch (\PDOException $e) {
        //     error_log("Error getting machines: " . $e->getMessage());
        //     throw new \Exception("Error al obtener las máquinas");
        // }
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
                     coordinates = :coordinates
                 WHERE machine_id = :machine_id";

        $stmt = $this->sql->prepare($query);
        $result = $stmt->execute([
            ':machine_id' => $data['machine_id'],
            ':model' => $data['model'],
            ':created_by' => $data['created_by'],
            ':serial_number' => $data['serial_number'],
            ':installation_date' => $data['installation_date'],
            ':coordinates' => $data['coordinates']
        ]);

        // if (!$result) {
        //     throw new \Exception("Error al actualizar la máquina");
        // }
        return true;
        // } catch (\PDOException $e) {
        //     error_log("Error updating machine: " . $e->getMessage());
        //     throw new \Exception("Error al actualizar la máquina");
        // }
    }

    public function getByIdMachine($idmachine)
    {
        try {
            $query = "SELECT * FROM Machine where machine_id = :machine_id";
            $stmt = $this->sql->prepare($query);
            $stmt->bindParam(':machine_id', $idmachine, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error getting user: " . $e->getMessage());
            return null;
        }
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

    public function getAllMachines()
    {
        try {
            $query = "SELECT * FROM machine ORDER BY machine_id DESC";
            $stmt = $this->sql->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error getting machines: " . $e->getMessage());
            throw new \Exception("Error al obtener las máquinas");
        }
    }

    public function getMachineById($machine_id)
    {
        // try {
            $query = "SELECT * FROM machine WHERE machine_id = :machine_id";
            $stmt = $this->sql->prepare($query);
            $stmt->execute([':machine_id' => $machine_id]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        // } catch (\PDOException $e) {
        //     error_log("Error getting machine by ID: " . $e->getMessage());
        //     throw new \Exception("Error al obtener la máquina por ID");
        // }
    }
}
