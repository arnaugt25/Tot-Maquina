<?php

namespace App\Controllers;

class CtrlNotification {
    protected $notificationModel;

    public function __construct() {
        $this->notificationModel = new \App\Models\Notification();
    }

    //Obtener notificacion (Get notification)
    public function getNotifications($request,$response,$container) {

            // Obtener todas las notificaciones (Get all notifications)
            $allNotifications = $this->notificationModel->getNotificationDetails();
            // Datos (Data)
            foreach($allNotifications as $notification) {
                echo "Incidencia: " . $notification['maintenance_id'] . "<br>";
                echo "Técnico: " . $notification['user_id'] . "<br>";
                echo "Máquina: " . $notification['machine_id'] . "<br>";
                echo "Fecha: " . $notification['next_maintenance'] . "<br>";
                echo "Frecuencia: " . $notification['frequency'] . "<br>";
            }
        $response->set("notifications",$allNotifications);
        return $response;
    }

    //Crear notificacion (Create notification)
    public function createNotification($data) {
            $this->notificationModel->createNotification($data);
            echo "Notificación creada con éxito.";

    }
}