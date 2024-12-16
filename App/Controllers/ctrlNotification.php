<?php

namespace App\Controllers;

class CtrlNotification {
    protected $notificationModel;

    public function __construct() {
        $this->notificationModel = new \App\Models\Notification();
    }

    public function getNotifications($request,$response,$container) {
        try {
            // Obtener todas las notificaciones
            $allNotifications = $this->notificationModel->getNotificationDetails();
            
            // Usar los datos...
            foreach($allNotifications as $notification) {
                echo "Incidencia: " . $notification['maintenance_id'] . "<br>";
                echo "Técnico: " . $notification['user_id'] . "<br>";
                echo "Máquina: " . $notification['machine_id'] . "<br>";
                echo "Fecha: " . $notification['next_maintenance'] . "<br>";
                echo "Frecuencia: " . $notification['frequency'] . "<br>";
            }
        } catch (\Exception $e) {
            // Aquí podrías registrar el error en un log
            echo "Error: " . $e->getMessage();
        }
        $response->set("notifications",$allNotifications);
        return $response;
    }

    public function createNotification($data) {
        try {
            $this->notificationModel->createNotification($data);
            echo "Notificación creada con éxito.";
        } catch (\Exception $e) {
            echo "Error al crear la notificación: " . $e->getMessage();
        }
    }
}