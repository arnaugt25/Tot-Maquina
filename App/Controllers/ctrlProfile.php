<?php

namespace App\Controllers;

class ctrlProfile {

    //Mostrar perfil (Show profile)
    public function profile($request, $response, $container){
        $user = $request->get("SESSION", "user");
        $machineModel = $container->get("Machine");
        // Verificar si el email existe (Check if the email exists)
        if (!isset($user['email'])) {
            $user['email'] = 'No disponible';
            // Opcional: Obtener el email desde la base de datos si es necesario (Optional: Get the email from the database if necessary)
            $usersModel = $container->get("Users");
            $userData = $usersModel->getUserById($user['user_id']);
            if ($userData && isset($userData['email'])) {
                $user['email'] = $userData['email'];
            }
        }
        // Verificar si el imagen de perfil existe (Check if the profile picture exists)
        if (!isset($user['profile_pic'])) {
            $user['profile_pic'] = 'No disponible';
            // Opcional: Obtener imagen de perfil desde la base de datos si es necesario (Optional: Get profile picture from database if needed)
            $usersModel = $container->get("Users");
            $userData = $usersModel->getUserById($user['user_id']);
            if ($userData && isset($userData['profile_pic'])) {
                $user['profile_pic'] = $userData['profile_pic'];
            }
        }
        // Obtener el conteo de máquinas asignadas
        $machineCount = $machineModel->countMachinesByUserId($user['user_id']);
    
        $response->set("user", $user);
        $response->set("machineCount", $machineCount);
        $response->setTemplate("profile.php");
        return $response;

    }

    //Mostrar formulario editar perfil (Show edit profile form)
    public function showEditForm($request, $response, $container) {
        $user = $request->get("SESSION", "user");
        // Obtener el email desde la base de datos si no está en la sesión (Get email from database if not logged in)
        if (!isset($user['email'])) {
            $usersModel = $container->get("Users");
            $userData = $usersModel->getUserById($user['user_id']);
            if ($userData) {
                $user = array_merge($user, $userData);
            }
        }
        // Verificar si el imagen perfil existe (Check if the profile picture exists)
        if (!isset($user['profile_pic'])) {
            $user['profile_pic'] = 'No disponible';
            // Opcional: Obtener imagen de perfil desde la base de datos (Optional: Get profile image from database)
            $usersModel = $container->get("Users");
            $userData = $usersModel->getUserById($user['user_id']);
            if ($userData && isset($userData['profile_pic'])) {
                $user['profile_pic'] = $userData['profile_pic'];
            }
        }
        $response->set("user", $user);
        $response->setTemplate("editprofile.php");
        return $response;
    }

    //Procesador de editar perfil (Edit Profile Processor)
    public function processEditProfile($request, $response, $container) {
            $user = $request->get("SESSION", "user");
            $data = [
                'name' => $_POST['name'] ?? '',
                'surname' => $_POST['surname'] ?? '',
                'email' => $_POST['email'] ?? '',
                'new_password' => $_POST['new_password'] ?? '',
                'profile_pic' => $_POST['profile_pic'] ?? '',
                'user_id' => $user['user_id']
            ];
            // Manejo de la imagen de perfil (Managing your profile picture)
            if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/images/';
                $fileExtension = pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION);
                $fileName = uniqid() . '.' . $fileExtension;
                $uploadFile = $uploadDir . $fileName;
                if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $uploadFile)) {
                    $data['profile_pic'] = $fileName;
                    // Eliminar la imagen anterior si existe (Delete the old image if it exists)
                    if (!empty($user['profile_pic']) && file_exists($uploadDir . $user['profile_pic'])) {
                        unlink($uploadDir . $user['profile_pic']);
                    }
                }
            }

            $usersModel = $container->get("Users");
            $result = $usersModel->editProfile($data);

            if ($result) {
                // Actualizar la sesión con los nuevos datos (Update the session with the new data)
                $user['name'] = $data['name'];
                $user['surname'] = $data['surname'];
                $user['email'] = $data['email'];
                if (isset($data['profile_pic'])) {
                    $user['profile_pic'] = $data['profile_pic'];
                }
                $response->setSession("user", $user);
                
                $response->redirect("Location: /profile");
                return $response;
            }
    }

}