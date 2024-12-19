<?php

namespace App\Controllers;

class ctrlHistory
{

    public function history($request, $response, $container)
    {
        $response->setTemplate("history.php");
        return $response;
    }

    // Controlador que muestra la info de del historial de dos modelos (Controller showing history information for two models)
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

    // Controlador para generar PDF del historial (Driver to generate PDF of history)
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

        // $response->setTemplate("history.php");
        //$response->redirect("Location: /history1");
        //$response->redirect("location: /history/".$idmaintenance);

        return $response;
        
    }

}
