<?php

namespace App\Controllers;

class CtrlNotification
{

    //Obtener notificacion (Get notification)
    function getNotifications($request, $response, $container)
    {
        $notifications = $container->get('Notification');
        $notification= $notifications->getNotificationDetails();
        $response->set("notifications", $notification);


<<<<<<< HEAD
=======







>>>>>>> dee29478616f79652e102929963cd67b3359ab47
        $response->setTemplate("notify.php");
        return $response;
    }

    //Crear notificacion (Create notification)
    public function createNotification($request, $response, $container)
    {
       // die("tenia razon");
        $response->set("notifications", "p");
        return $response;

    }
}