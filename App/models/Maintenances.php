<?php

namespace App\Models;

class Maintenances extends Db
{
    public function addMaintenance($data)
    {
        // Validar que todos los campos requeridos existen
        $required_fields = ['description', 'type', 'assigned_date', 'user_id', 'machine_id', 'priority'];
        foreach ($required_fields as $field) {
            if (!isset($data[$field])) {
                throw new \Exception("Campo requerido faltante: {$field}");
            }
        }

        $query = "INSERT INTO maintenance (description, type, assigned_date, user_id, machine_id, priority ) 
                       VALUES (:description, :type, :assigned_date, :user_id, :machine_id, :priority)";
        $stmt = $this->sql->prepare($query);
        $result = $stmt->execute([
            ':description' => $data['description'],
            ':type' => $data['type'],
            ':assigned_date' => $data['assigned_date'],
            ':user_id' => $data['user_id'],
            ':machine_id' => $data['machine_id'],
            ':priority' => $data['priority']
        ]);
        if (!$result) {
            throw new \Exception("Error al añadir un mantenimiento");
        }
        return $this->sql->lastInsertId();
    }

    // public function listMaintenance()
    // {
    //     //$query = "SELECT * FROM maintenance";
    //     $query = "SELECT description, type FROM maintenance WHERE maintenance_id = :maintenance_id";
    //     //$query ="select m.description, m.type, ma.installation_date, u.name from maintenance m join machine ma on m.machine=ma.machine_id join user u on u.user_id=m.user_id";
    //     $stmt = $this->sql->prepare($query);
    //     $stmt->execute();
    //     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // }

    public function historydMaintenance($idmaintenance)
    {
        //$query = "SELECT * FROM maintenance WHERE maintenance_id = :maintenance_id";
        $query = "SELECT maintenance_id, m.description, m.type, ma.installation_date, u.name from maintenance m join machine ma on m.machine_id = ma.machine_id join user u on u.user_id = m.user_id WHERE maintenance_id = :maintenance_id";
        $stmt = $this->sql->prepare($query);
        // $idmaintenance = 1;
        $stmt->bindParam(':maintenance_id', $idmaintenance, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}
