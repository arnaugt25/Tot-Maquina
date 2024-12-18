<?php

namespace App\Models;

use PDO;
use PDOException;

class Notification {
    private $db;

    public function __construct() {
        try {
            // Conectar a la base de datos
            $this->db = new PDO('mysql:host=localhost;dbname=tu_base_de_datos', 'usuario', 'contraseña');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores
        } catch (PDOException $e) {
            // Manejo de errores de conexión
            echo "Error de conexión: " . $e->getMessage();
            exit; // Termina la ejecución si no se puede conectar
        }
    }

    public function getNotificationDetails() {
        $stmt = $this->db->prepare("SELECT * FROM notification");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; // Devuelve un array vacío si no hay resultados
    }

    public function getNotificationById($id) {
        $stmt = $this->db->prepare("SELECT * FROM notification WHERE notification_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null; // Devuelve null si no se encuentra la notificación
    }


    // Método para crear una nueva notificación
    public function createNotification($data) {
        $stmt = $this->db->prepare("INSERT INTO notification (frequency, next_maintenance, machine_id, user_id, maintenance_id) VALUES (:frequency, :next_maintenance, :machine_id, :user_id, :maintenance_id)");
        $stmt->bindParam(':frequency', $data['frequency']);
        $stmt->bindParam(':next_maintenance', $data['next_maintenance']);
        $stmt->bindParam(':machine_id', $data['machine_id']);
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':maintenance_id', $data['maintenance_id']);
        return $stmt->execute();
    }


    // Método para eliminar una notificación
    public function deleteNotification($id) {
        $stmt = $this->db->prepare("DELETE FROM notification WHERE notification_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}