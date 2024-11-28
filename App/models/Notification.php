<?php

namespace App\Models;

class Notification extends DB {
    // INSERT
    public function addNotification($data) {
        try {
            $query = "INSERT INTO Notification (notification_id, frequency, next_maintenance, machine_id, user_id, maintenance_id) 
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

    // SELECT
    public function getAllNotifications() {
        try {
            $query = "SELECT notification_id, frequency, next_maintenance, machine_id, user_id, maintenance_id 
                      FROM Notification 
                      ORDER BY next_maintenance DESC";
            
            $stmt = $this->sql->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch (\PDOException $e) {
            error_log("Error getting notifications: " . $e->getMessage());
            throw new \Exception("Error al obtener las notificaciones");
        }
    }

    public function getNotificationsByUser($user_id) {
        try {
            $query = "SELECT notification_id, frequency, next_maintenance, machine_id, maintenance_id 
                      FROM Notification 
                      WHERE user_id = :user_id 
                      ORDER BY next_maintenance DESC";
            
            $stmt = $this->sql->prepare($query);
            $stmt->execute([':user_id' => $user_id]);
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch (\PDOException $e) {
            error_log("Error getting user notifications: " . $e->getMessage());
            throw new \Exception("Error al obtener las notificaciones del usuario");
        }
    }

    public function getNotificationById($notification_id) {
        try {
            $query = "SELECT notification_id, frequency, next_maintenance, machine_id, user_id, maintenance_id 
                      FROM Notification 
                      WHERE notification_id = :notification_id";
            
            $stmt = $this->sql->prepare($query);
            $stmt->execute([':notification_id' => $notification_id]);
            
            return $stmt->fetch(\PDO::FETCH_ASSOC);
            
        } catch (\PDOException $e) {
            error_log("Error getting notification: " . $e->getMessage());
            throw new \Exception("Error al obtener la notificación");
        }
    }
}