<?php

namespace App\Controllers;

class ctrlLogin {
    public function login($request, $response, $container) {
        $error = $request->get("SESSION", "error");
        $response->set("error", $error);
        $response->setSession("error", ""); // Limpiamos el error después de mostrarlo
        $response->setTemplate("login.php");
        return $response;
    }

    public function ctrlLogin($request, $response, $container) {
        try {
            $username = $request->get(INPUT_POST, "username");
            $password = $request->get(INPUT_POST, "password");

            $userModel = $container->get("Users");
            $user = $userModel->login($username, $password);
            
            $response->setSession('user', $user);
            $response->setSession('logged', true);
            $response->redirect("Location: /");
            
        } catch (\Exception $e) {
            $response->setSession("error", $e->getMessage());
            $response->redirect("Location: /login");
        }
        
        return $response;
    }

    public function logout($request, $response, $container) {
        $response->setSession("user", null);
        $response->setSession("logged", false);
        $response->setSession("message", "Has cerrado sesión correctamente");
        $response->redirect("Location: /login");
        return $response;
    }
}

