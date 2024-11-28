<?php


namespace App\Controllers;

$notificationModel = new \App\Models\Notification();

try {
    // Obtener todas las notificaciones
    $allNotifications = $notificationModel->getAllNotifications();

    // Obtener notificaciones de un usuario específico
    $userNotifications = $notificationModel->getNotificationsByUser($user_id);

    // Obtener una notificación específica
    $notification = $notificationModel->getNotificationById($notification_id);

    // Crear una nueva notificación
    $notificationData = [
        'notification_id' => null, 
        'frequency' => $frequency,
        'next_maintenance' => $next_maintenance,
        'machine_id' => $machine_id,
        'user_id' => $user_id,
        'maintenance_id' => $maintenance_id
    ];
    
    $newNotificationId = $notificationModel->addNotification($notificationData);

} catch (\Exception $e) {
    // Manejar el error
    error_log("Error en notificaciones: " . $e->getMessage());
    echo "Error: " . $e->getMessage();
}

