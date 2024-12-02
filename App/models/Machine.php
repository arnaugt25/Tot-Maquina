<?php

namespace App\Models;

class Machine extends db {

    public function addMachine($data){
        // try {
    
            $query = "INSERT INTO machine (model, created_by, serial_number, installation_date, image ) 
                       VALUES (:model, :created_by, :serial_number, :installation_date, :image)";
        //     var_dump($query);
        //    die();
            $stmt = $this->sql->prepare($query);
            $result = $stmt->execute([
                ':model' => $data['model'],
                ':created_by' => $data['created_by'],
                ':serial_number' => $data['serial_number'],
                ':installation_date' => $data['installation_date'],
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

    public function listMachine(){
     try {
        $query = "SELECT * FROM machine";
        // var_dump($query);
        // die();
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
        error_log("Error getting machines: " . $e->getMessage());
        throw new \Exception("Error al obtener las máquinas");
    }
}

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
    }

    public function getMachineById($machine_id) {
        try {
            $query = "SELECT * FROM Machine WHERE machine_id = :machine_id";
            $stmt = $this->sql->prepare($query);
            $stmt->execute([':machine_id' => $machine_id]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error getting machine by ID: " . $e->getMessage());
            throw new \Exception("Error al obtener la máquina por ID");
        }
    }

}
