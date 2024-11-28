<?php

namespace App\Models;

class Notification extends DB {
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
    public function getNotificationDetails() {
        try {
            $query = "SELECT 
                        n.notification_id,
                        n.frequency,
                        DATE_FORMAT(n.next_maintenance, '%d-%m-%Y') as formatted_next_maintenance,
                        m.name as machine_name,
                        m.machine_id,
                        u.name as technician_name,
                        u.surname as technician_surname,
                        mt.description as maintenance_description,
                        mt.type as maintenance_type
                    FROM 
                        Notification n
                        INNER JOIN Machine m ON n.machine_id = m.machine_id
                        INNER JOIN User u ON n.user_id = u.user_id
                        INNER JOIN Maintenance mt ON n.maintenance_id = mt.maintenance_id
                    ORDER BY 
                        n.next_maintenance ASC";
            
            $stmt = $this->sql->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch (\PDOException $e) {
            error_log("Error getting notification details: " . $e->getMessage());
            throw new \Exception("Error al obtener los detalles de las notificaciones");
        }
    }
    // Método opcional para marcar una notificación como leída
    public function markAsRead($notification_id) {
        try {
            $query = "UPDATE Notification SET status = 'read' WHERE notification_id = :notification_id";
            
            $stmt = $this->sql->prepare($query);
            return $stmt->execute([':notification_id' => $notification_id]);
            
        } catch (\PDOException $e) {
            error_log("Error updating notification: " . $e->getMessage());
            throw new \Exception("Error al actualizar la notificación");
        }
    }
}