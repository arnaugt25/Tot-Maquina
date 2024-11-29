<?php

namespace App\Controllers;

class ctrlAdmin {

   // Controlador
    public function index($request, $response, $container) {
        $usersModel = $container->get("Users");
        $users = $usersModel->getAllUsers();
        
        // Debug
        error_log(print_r($users, true));
        
        $response->set("users", $users);
        $response->setTemplate("Admin.php");
        
        return $response;
    }

}