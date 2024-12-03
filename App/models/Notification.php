<?php

namespace App\Models;

class notification extends DB {
    // INSERT
    public function addNotification($data)
    {
        try {
            $query = "INSERT INTO notification (notification_id, frequency, next_maintenance, machine_id, user_id, maintenance_id) 
                      VALUES (:notification_id, :frequency, :next_maintenance, :machine_id, :user_id, :maintenance_id)";

            $stmt = $this->sql->prepare($query);
            $result = $stmt->execute([
                ':notification_id' => $data['notification_id'],
                ':frequency' => $data['frequency'],
                ':next_maintenance' => $data['next_maintenance'],
                ':machine_id' => $data['machine_id'],
                ':user_id' => $data['user_id'],
                ':maintenance_id' => $data['maintenance_id']
            ]);

            if (!$result) {
                throw new \Exception("Error al crear la notificación");
            }

            return $this->sql->lastInsertId();

        } catch (\PDOException $e) {
            error_log("Error creating notification: " . $e->getMessage());
            throw new \Exception("Error al crear la notificación");
        }
    }
    }
