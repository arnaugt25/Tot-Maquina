<?php

namespace App\Controllers;

class ctrlProfile {
    public function profile($request, $response, $container){
        $user = $request->get("SESSION", "user");
        $response->set("user", $user);
        $response->setTemplate("profile.php");
        return $response;
    }

    public function showEditForm($request, $response, $container) {
        $user = $request->get("SESSION", "user");
        $response->set("user", $user);
        $response->setTemplate("EditProfile.php");
        return $response;
    }

    public function processEditProfile($request, $response, $container) {
        try {
            $user = $request->get("SESSION", "user");
            
            $data = [
                'name' => $_POST['name'] ?? '',
                'surname' => $_POST['surname'] ?? '',
                'email' => $_POST['email'] ?? '',
                'new_password' => $_POST['new_password'] ?? '',
                'user_id' => $user['user_id']
            ];

            $usersModel = $container->get("Users");
            $result = $usersModel->editProfile($data);

            if ($result) {
                $user['name'] = $data['name'];
                $user['surname'] = $data['surname'];
                $user['email'] = $data['email'];
                $response->setSession("user", $user);
                
                $response->redirect("Location: /profile");
                return $response;
            }

        } catch (\Exception $e) {
            $response->setSession("error", $e->getMessage());
            $response->redirect("Location: /editprofile");
            return $response;
        }
    }
}