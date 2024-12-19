<?php

namespace App\Models;

use PDO;
use PDOException;

class Notification {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    //Detalles notificación (Notification details)
    public function getNotificationDetails($id) {
        $stmt = $this->db->prepare("SELECT n.*,u.username,m.model FROM notification n left join machine m on n.machine_id = m.machine_id left join user u on u.user_id = n.user_id where n.user_id = :id");
        $stmt->execute([":id"=> $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; // Devuelve un array vacío si no hay resultados (Returns an empty array if there are no results)
    }

    // Notificaciones por id (Notifications by id)
    public function getNotificationById($id) {
        $stmt = $this->db->prepare("SELECT * FROM notification WHERE notification_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null; // Devuelve null si no se encuentra la notificación (Returns null if the notification is not found)
    }


    // Método para crear una nueva notificación (Returns null if the notification is not found)
    public function createNotification($data) {
        $stmt = $this->db->prepare("INSERT INTO notification (frequency, next_maintenance, machine_id, user_id, maintenance_id) VALUES (:frequency, :next_maintenance, :machine_id, :user_id, :maintenance_id)");
        $stmt->bindParam(':frequency', $data['frequency']);
        $stmt->bindParam(':next_maintenance', $data['next_maintenance']);
        $stmt->bindParam(':machine_id', $data['machine_id']);
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':maintenance_id', $data['maintenance_id']);
        return $stmt->execute();
    }


    // Método para eliminar una notificación (Method to delete a notification)
    public function deleteNotification($id) {
        $stmt = $this->db->prepare("DELETE FROM notification WHERE notification_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}