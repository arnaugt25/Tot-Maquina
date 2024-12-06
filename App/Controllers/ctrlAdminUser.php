<?php

namespace App\Controllers;
use App\models\Users;
class ctrlAdminUser {
    public function index($request, $response, $container){
        $response->setTemplate("addUser.php");
        return $response;
    }

    public function addUser($request, $response, $container){

            $name = $request->get(INPUT_POST, "name");
            $surname = $request->get(INPUT_POST, "surname");
            $username = $request->get(INPUT_POST, "username");
            $password = password_hash($request->get(INPUT_POST, "password"), PASSWORD_DEFAULT);
            $email = $request->get(INPUT_POST, "email");
            $role = $request->get(INPUT_POST, "role");
            $profile_pic = $request->get("FILES", "profile_pic");
    
            $unique_id = uniqid();
            $upload_dir = "uploads/images/";
            $file_name = $unique_id . "_" . basename($profile_pic['name']);
            $dir_file = $upload_dir . $file_name;
    
            move_uploaded_file($profile_pic['tmp_name'], $dir_file);
    
            $users = $container->get("Users");
    
            $users->addUser($username, $password, $email, $file_name, $name, $surname, $role);
    
        $response->redirect("Location: /admin");
        
        return $response;
    }

    public function formEditUser($request, $response, $container) {
        try {
            // Obtener el ID del usuario de los parámetros de la URL
            $userId = $request->getParam('id'); // Cambiado para obtener el parámetro de la URL
            
            if (!$userId) {
                throw new \Exception("ID de usuario no proporcionado");
            }
            
            // Obtener los datos del usuario
            $users = $container->get("Users");
            $user = $users->getUserById($userId);
            
            // Verificar si el usuario existe
            if (!$user) {
                throw new \Exception("Usuario no encontrado");
            }
            
            // Pasar los datos del usuario a la vista
            $response->set("user", $user);
            $response->setTemplate("edituser.php");
            return $response;
            
        } catch (\Exception $e) {
            // Log del error
            error_log("Error en formEditUser: " . $e->getMessage());
            
            // Pasar el mensaje de error a la vista de error
            $response->set("error", "No se pudo cargar la información del usuario");
            $response->setTemplate("error.php");
            return $response;
        }
    }

    public function editUser($request, $response, $container) {
        try {
            // Log para verificar los datos recibidos
            error_log("Datos POST recibidos: " . print_r($_POST, true));
            
            // Verificar si el user_id está presente
            $user_id = $request->get(INPUT_POST, "user_id");
            if (!$user_id) {
                throw new \Exception("ID de usuario no proporcionado");
            }
            
            // Obtener datos del formulario
            $data = [
                'name' => $request->get(INPUT_POST, "name"),
                'surname' => $request->get(INPUT_POST, "surname"),
                'username' => $request->get(INPUT_POST, "username"),
                'email' => $request->get(INPUT_POST, "email"),
                'role' => $request->get(INPUT_POST, "role"),
                'user_id' => $user_id
            ];

            // Log para verificar el array de datos
            error_log("Array de datos preparado: " . print_r($data, true));

            // Verificar que todos los campos requeridos estén presentes
            foreach ($data as $key => $value) {
                if (empty($value)) {
                    throw new \Exception("El campo {$key} es requerido");
                }
            }

            $usersModel = $container->get("Users");
            $result = $usersModel->editUser($data);

            if ($result) {
                $response->setSession("message", "Usuario actualizado correctamente");
                $response->redirect("Location: /admin");
            } else {
                throw new \Exception("No se pudo actualizar el usuario");
            }

        } catch (\Exception $e) {
            // Log detallado del error
            error_log("Error en editUser: " . $e->getMessage());
            error_log("Trace: " . $e->getTraceAsString());
            
            // Guardar el error en la sesión
            $response->setSession("error", $e->getMessage());
            
            // Redirigir de vuelta al formulario
            if (isset($data['user_id'])) {
                $response->redirect("Location: /admin/edituser/" . $data['user_id']);
            } else {
                $response->redirect("Location: /admin");
            }
        }
        
        return $response;
    }

    public function deleteUser($request, $response, $container) {
        $userId = $request->getParam('id');
        $usersModel = $container->get("Users");
        $result = $usersModel->deleteUser($userId);  
        $_SESSION['success'] = "Usuario eliminado correctamente";
        $response->redirect("Location: /admin");
    
        return $response;
    }
}	