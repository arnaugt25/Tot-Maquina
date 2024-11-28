<?php

namespace App\Controllers;

class ctrlFormMachine {

    public function formMachine($request, $response, $container){

        $response->setTemplate("formMachine.php");

        return $response;
    }
}