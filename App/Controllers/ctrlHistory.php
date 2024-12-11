<?php

namespace App\Controllers;

class ctrlHistory
{

    public function history($request, $response, $container)
    {

        $response->setTemplate("history.php");
        return $response;
    }

    //Mostrar la info de del historial
    public function showhistory($request, $response, $container)
    {
        $idmaintenance = $request->getParam('id');
        $historyModel = $container->get("Maintenances");
        $history = $historyModel->historydMaintenance($idmaintenance);
        //$historyModel2 = $container->get("Maintenances");
        //$history2 = $historyModel2->getMaintenance($idmaintenance);
        // var_dump($history);
        // die;
        $response->set('historialbd', $history);
       // $response->set('historialbd1', $history2);
        $response->setTemplate("history.php");
        return $response;
    }

    
}
