<?php

namespace App\Models;

class Notification extends DB {
    public function addNotification($data) {
        try {
            $query = "INSERT INTO Notification (user_id, message, type, status, created_at) 
                      VALUES (:user_id, :message, :type, :status, NOW())";
            
            $stmt = $this->sql->prepare($query);
            $result = $stmt->execute([
                ':user_id' => $data['user_id'],
                ':message' => $data['message'],
                ':type' => $data['type'],
                ':status' => 'unread'  // Por defecto, la notificación está sin leer
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