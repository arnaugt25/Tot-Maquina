<?php

namespace App\Controllers;

class ctrlProfile {

    public function profile($request, $response, $container){

        $response->setTemplate("profile.php");

        return $response;
    }
}