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
        
        $machineId = $request->getParam('id');
        $machineModel = $container->get("Machine");
        $machine = $machineModel->getMachineById($machineId);
        $response->set('machine', $machine);

        $historyModel = $container->get("Maintenances");
        $history = $historyModel->historyMaintenance($idmaintenance);
        $incidence = $historyModel->searchMaintenance($idmaintenance);
        //$historyModel2 = $container->get("Maintenances");
        //$history2 = $historyModel2->getMaintenance($idmaintenance);
        // var_dump($incidence);
        // die;
        $response->set('historialbd', $history);
        $response->set('infomaintenance', $incidence);
       // $response->set('historialbd1', $history2);
        $response->setTemplate("history.php");
        return $response;
    }


    //Mostrar info de incidencia en el historial
    // public function showMaintenances($request, $response, $container) {
    //     $idmaintenance= $request->getParam('id');
    //     $historyModel = $container->get("maintenance");
    //     $history = $historyModel->searchMaintenance($idmaintenance);
    //     //var_dump($history);
    //     //die();
    //     $response->set('infomaintenance', $history);
    //     $response->setTemplate("history.php");
    //     return $response;
    // }

    public function generatePdf($request, $response, $container) {
        $idmaintenance = $request->getParam('id');
        $historyModel = $container->get("Maintenances");
        $history = $historyModel->historyMaintenance($idmaintenance);
        $incidence = $historyModel->searchMaintenance($idmaintenance);
        // var_dump($history);
        // die;
       
        $response->set("historial",$history);
        $response->set("incidencias",$incidence);
        // var_dump($response);
        // die();
        return $response;
        
    }

}
