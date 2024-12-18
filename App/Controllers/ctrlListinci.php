<?php

namespace App\Controllers;


class ctrlListinci{
    
    public function index($request, $response, $container){
        $maintenances = $container->get('maintenance');
        $maintenance = $maintenances->getMaintenances();
        $response->set("maintenances", $maintenance);
        $response->setTemplate("listinci.php");
        return $response;
    }

    //Crear incidencia (Create an incident)
    public function create($request, $response, $container){
        $crear = $_POST;
        $maintenanceModel = $container->get("maintenance");
        $maintenanceModel-> addMaintenance($crear);
        $response->redirect("location: /listinci");
        return $response;
    }

    //Editar incidencia (Edit issue)
    public function editMaintenance($request, $response, $container)
    {
        $machine = $container->get('Machine');
        $machine = $machine->listMachine();
        $maintenanceid = $request->getparam("id");
        //var_dump($maintenanceid);
        //die();
        $machineModel = $container->get("maintenance");
        $maintenance = $machineModel->getMaintenanceById($maintenanceid);
        $UsersModel = $container->get("Users");
        $Users = $UsersModel->getAllTechnicians("username");

        $response->set("machine", $machine);
        $response->set('maintenance', $maintenance);
        $response->set('Users', $Users);
        $response->setTemplate("editinci.php");
        return $response;
    }

    //Editar incidencia (Edit issue)
    public function updateMaintenance($request, $response, $container)
    {
        $maintenanceid = $request->getparam("id");
        $maintenanceModel = $container->get("maintenance");

        $data = [
            'maintenance_id' => $maintenanceid,
            'description' => $request->get(INPUT_POST, "description"),
            'user_id' => $request->get(INPUT_POST, "user_id"),
            'assigned_date' => $request->get(INPUT_POST, "assigned_date"),
            'priority' =>  $request->get(INPUT_POST, "priority"),
            'type' =>  $request->get(INPUT_POST, "type"),
            'machine_id' => $request->get(INPUT_POST, "machine_id")
        ];

        $result= $maintenanceModel->editMaintenance($data);
        $response->redirect("Location: /listinci");
        return $response;
    }

    //Eliminar incidencia (Delete issue)
    public function deleteMaintenance($request, $response, $container) {
        $maintenanceid = $request->getParam('id');
        $maintenancesModel = $container->get("maintenance");
        $result = $maintenancesModel->deleteMaintenances($maintenanceid);
        $response->redirect("Location: /listinci");
        return $response;
    }
    public function searchMaintenance($request, $response, $container) {
        $query = $request->get(INPUT_GET, "query");
        $maintenanceModel = $container->get("maintenance");
        $results = $maintenanceModel->searchMaintenance($query);
        header('Content-Type: application/json');
        echo json_encode($results);
        exit;
    }
}