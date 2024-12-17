<?php


namespace App\Controllers;

class ctrlNotification
{
    public function Notification($request, $response, $container)
    {

        $notificationModel = $container->get("Notification");
        //PRINT_r("---");
        //die();
        $notification = $notificationModel->notification();



        $response->setTemplate("notify.php");
        $response->set('notifications', $notification);

        return $response;
    }

    public function create($request, $response, $container)
    {

        $data = $request->getParsedBody();

        if (empty($data['notification_id']) || empty($data['maintenance_id'])) {
            return $response->withRedirect('/notification?error=Campos obligatorios faltantes');
        }


        $notificationModel = $container->get('Notification');

        $notificationModel->addNotification($data);

        return $response->withRedirect('/notification?success=Notificación creada exitosamente');
    }

    public function update($request, $response, $container)
    {

        $data = $request->getParsedBody();


        if (empty($data['notification_id']) || empty($data['maintenance_id']) || empty($data['machine_id']) || empty($data['user_id']) || empty($data['frequency']) || empty($data['next_maintenance'])) {

            return $response->withRedirect('/notification/edit?id=' . $data['notification_id'] . '&error=Faltan campos requeridos');
        }


        $notificationModel = $container->get('Notification');
        $result = $notificationModel->editNotification($data);

        if ($result) {

            return $response->withRedirect('/notification?success=Actualización exitosa');
        } else {

            return $response->withRedirect('/notification/edit?id=' . $data['notification_id'] . '&error=Error al actualizar');
        }
    }

    public function delete($request, $response, $container)
    {
        // Obtener el ID de la notificación a eliminar
        $notification_id = $request->getAttribute('id');

        // Asegúrate de que el ID esté presente
        if (empty($notification_id)) {
            return $response->withRedirect('/notification?error=No se especificó el ID');
        }

        // Obtener el modelo de notificaciones
        $notificationModel = $container->get('Notification');

        // Intentar eliminar la notificación
        $result = $notificationModel->deleteNotification($notification_id);

        if ($result) {
            // Redirigir con un mensaje de éxito si la eliminación fue exitosa
            return $response->withRedirect('/notification?success=Notificación eliminada');
        } else {
            // Redirigir con un mensaje de error si hubo un problema
            return $response->withRedirect('/notification?error=Error al eliminar la notificación');
        }
    }
}