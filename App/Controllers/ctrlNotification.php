<?php

namespace App\Controllers;

class ctrlNotification {
    private $notificationModel;

    public function __construct() {
        $this->notificationModel = new \App\Models\Notification();
    }

    public function index() {
        try {
            // Obtener todas las notificaciones con detalles
            $notifications = $this->notificationModel->getNotificationDetails();
            
            // Cargar la vista con los datos
            require_once '../App/Views/notification/list.php';
            
        } catch (\Exception $e) {
            error_log("Error en listado de notificaciones: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }

    public function create() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Procesar el formulario
                $notificationData = [
                    'notification_id' => null, // Si es autoincremental
                    'frequency' => $_POST['frequency'],
                    'next_maintenance' => $_POST['next_maintenance'],
                    'machine_id' => $_POST['machine_id'],
                    'user_id' => $_POST['user_id'],
                    'maintenance_id' => $_POST['maintenance_id']
                ];

                $newNotificationId = $this->notificationModel->addNotification($notificationData);
                
                // Redirigir a la lista de notificaciones
                header('Location: /notification');
                exit;
            }

            // Mostrar el formulario
            require_once '../App/Views/notification/create.php';
            
        } catch (\Exception $e) {
            error_log("Error al crear notificación: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }

    public function view($notification_id) {
        try {
            // Obtener una notificación específica
            $notification = $this->notificationModel->getNotificationById($notification_id);
            
            // Cargar la vista de detalle
            require_once '../App/Views/notification/detail.php';
            
        } catch (\Exception $e) {
            error_log("Error al ver notificación: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }

    public function getByUser($user_id) {
        try {
            // Obtener notificaciones por usuario
            $userNotifications = $this->notificationModel->getNotificationsByUser($user_id);
            
            // Cargar vista o retornar datos
            require_once '../App/Views/notification/user_notifications.php';
            
        } catch (\Exception $e) {
            error_log("Error al obtener notificaciones del usuario: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }

    public function getByMachine($machine_id) {
        try {
            // Obtener notificaciones por máquina
            $machineNotifications = $this->notificationModel->getNotificationsByMachine($machine_id);
            
            // Cargar vista o retornar datos
            require_once '../App/Views/notification/machine_notifications.php';
            
        } catch (\Exception $e) {
            error_log("Error al obtener notificaciones de la máquina: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($notification_id) {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $notificationData = [
                    'notification_id' => $notification_id,
                    'frequency' => $_POST['frequency'],
                    'next_maintenance' => $_POST['next_maintenance'],
                    'machine_id' => $_POST['machine_id'],
                    'user_id' => $_POST['user_id'],
                    'maintenance_id' => $_POST['maintenance_id']
                ];

                $this->notificationModel->updateNotification($notificationData);
                
                header('Location: /notification');
                exit;
            }

            // Obtener datos actuales de la notificación
            $notification = $this->notificationModel->getNotificationById($notification_id);
            
            // Mostrar formulario de edición
            require_once '../App/Views/notification/edit.php';
            
        } catch (\Exception $e) {
            error_log("Error al actualizar notificación: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }

    public function delete($notification_id) {
        try {
            $this->notificationModel->deleteNotification($notification_id);
            
            header('Location: /notification');
            exit;
            
        } catch (\Exception $e) {
            error_log("Error al eliminar notificación: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }
}
