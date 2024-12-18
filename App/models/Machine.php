<?php

namespace App\Models;

class Machine extends Db
{
    //Añadir máquina (Add machine)
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

    //Listar máquina (list machine)
    public function listMachine()
    {
        $query = "SELECT * FROM machine";
        // var_dump($query);
        // die();
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Editar maquina (edit machine)
    public function editMachine($data)
    {
        // Id_machine
        if (is_numeric($data)) {
            return $this->getByIdMachine($data);
        }
        // Si es un array, actualizar la máquina (If it is an array, update the machine)
        $query = "UPDATE machine 
                 SET model = :model, created_by = :created_by, serial_number = :serial_number, installation_date = :installation_date,
                     coordinates = :coordinates, image = :image WHERE machine_id = :machine_id";
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

    //Obtener por id (Get by id)
    public function getByIdMachine($idmachine)
    {
        $query = "SELECT * FROM Machine where machine_id = :machine_id";
        $stmt = $this->sql->prepare($query);
        $stmt->bindParam(':machine_id', $idmachine, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    //Obtener todas las máquinas (Get all machines)
    public function getAllMachines() {
        $query = "SELECT * FROM machine ORDER BY machine_id DESC";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Buscar máquina por ID (Search machine by ID)
    public function getMachineById($machine_id)
    {
        $query = "SELECT * FROM machine WHERE machine_id = :machine_id";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':machine_id' => $machine_id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    //Eliminar Máquina (Delete Machine)
    public function deleteMachine($machine_id)
    {
        $query = "DELETE FROM machine WHERE machine_id = :machine_id";
        $stmt = $this->sql->prepare($query);
        $result = $stmt->execute([':machine_id' => $machine_id]);
        return true;
    }

    //Buscador de máquina modelo (Machine model finder)
    public function searchMachine($query) {
        $searchTerm = "%{$query}%";
        $sql = "SELECT * FROM machine WHERE model LIKE :query 
                OR serial_number LIKE :query OR created_by LIKE :query";
        $stmt = $this->sql->prepare($sql);
        $stmt->execute([':query' => $searchTerm]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Asignar técnico a una máquina (Assign technician to a machine)
    public function assignTechnician($machineId, $technicianId) {
        $query = "UPDATE machine SET user_id = ? WHERE machine_id = ?";
        $stmt = $this->sql->prepare($query);
        return $stmt->execute([$technicianId, $machineId]);
    }

    public function countMachinesByUserId($user_id) {
        $query = "SELECT COUNT(*) FROM machine WHERE user_id = :user_id";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchColumn();
    }
}