<?php


namespace App\Controllers;

class ctrlNotification {
    public function ctrlNotification() {
        $notificationModel = new \App\Models\Notification();

        try {
            // Obtener todos los mantenimientos
            $allNotifications = $notificationModel->getNotificationDetails();
            
            // Obtener un mantenimiento específico
            $notification = $notificationModel->getNotificationById($notification_id);
               
            // Usar los datos...
            foreach($allNotifications as $notification) {
                echo "Mantenimiento: " . $notification['maintenance_description'] . "<br>";
                echo "Técnico: " . $notification['id_user'] . "<br>";
                echo "Máquina: " . $notification['machine_id'] . "<br>";
                echo "Fecha: " . $notification['formatted_next_maintenance'] . "<br>";
                echo "Frecuencia: " . $notification['frequency'] . "<br>";
            }
            
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
