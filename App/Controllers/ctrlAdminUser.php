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
}	