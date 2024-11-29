<?php

namespace App\Models;

class Machine extends db {

    public function addMachine($data){
        // try {
    
            $query = "INSERT INTO Machine (model, created_by, serial_number, installation_date, image ) 
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
}
