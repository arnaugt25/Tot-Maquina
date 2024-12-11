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
        $history = $historyModel->getByIdMaintenance($idmaintenance);
        //var_dump($history2);
        //die;
        $response->set('historialbd', $history);
        $response->setTemplate("history.php");
        return $response;
    }

    public function showhistory2($request, $response, $container)
    {

        $idmaintenance = $request->getParam('id');
        $historyModel2 = $container->get("Maintenances");
        $history2 = $historyModel2->getMaintenance($idmaintenance);
        var_dump($history2);
        die;
        
        $response->set('historialbd1', $history2);
        $response->setTemplate("history.php");
        return $response;
    }
}
