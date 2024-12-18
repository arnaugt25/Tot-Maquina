<?php

namespace App\Controllers;

class ctrlFormMachine
{
    //Mostrar formulario añadir maquina (Show form add machine) 
    public function formMachine($request, $response, $container)
    {
        $response->setTemplate("formMachine.php");
        return $response;
    }

    //Añadir maquina a la BDD (Add machine to the database)
    public function ctrladdMachine($request, $response, $container)
    {
        $model = $request->get(INPUT_POST, "model");
        $createdby = $request->get(INPUT_POST, "created_by");
        $dateinstall = $request->get(INPUT_POST, "installation_date");
        $serialnum = $request->get(INPUT_POST, "serial_number");
        $coordinates = $request->get(INPUT_POST, "coordinates");
        //Image
        $imageURL = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/images';
            $imageName = basename($_FILES['image']['name']);
            $targetPath = $uploadDir . $imageName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imageURL = '/' . $targetPath;
            }
        }
        //Array de los datos (Array of data)
        $machineData = [
            'model' => $model,
            'created_by' => $createdby,
            'installation_date' => $dateinstall,
            'serial_number' => $serialnum,
            'coordinates' => $coordinates,
            'image' => $imageURL
        ];
        $machineModel = $container->get("Machine");
        $machine = $machineModel->addMachine($machineData);
        $response->setSession('machine', $machine);
        $response->redirect("Location: /addlist");
        return $response;
    }

    //Mostrar maquina en lista de maquinas con la info de la bdd (Show machine in machine list with database info)
    public function ctrlListMachine($request, $response, $container)
    {
        $machineModel = $container->get("Machine");
        // var_dump($machineModel);
        // die();
        $machines = $machineModel->listMachine();
        $response->set('machines', $machines);
        $response->setTemplate("machinelist.php");
        return $response;
    }

    //Mostrar form editar maquina (Show form edit machine)
    public function editMachine($request, $response, $container)
    {
        $machineId = $request->get(INPUT_GET, "machine_id");
        // var_dump($machineId);
        // die();
        $machineModel = $container->get("Machine");
        $machine = $machineModel->getMachineById($machineId);
        $response->set('machine', $machine);
        $response->setTemplate("editMachine.php");
        return $response;
    }

    //Para hacer el update en la bdd (To make the update in the database)
    public function updateMachine($request, $response, $container)
    {
        $machineId = $request->get(INPUT_GET, "machine_id");
        $machineModel = $container->get("Machine");
        $currentMachine = $machineModel->getMachineById($machineId);
        // Image
        $imageURL = $currentMachine['image'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            $imageName = basename($_FILES['image']['name']);
            $targetPath = $uploadDir . $imageName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imageURL = '/' . $targetPath; 
            }
        }
        $data = [
            'machine_id' => $machineId,
            'model' => $request->get(INPUT_POST, "model"),
            'created_by' => $request->get(INPUT_POST, "created_by"),
            'installation_date' => $request->get(INPUT_POST, "installation_date"),
            'serial_number' => $request->get(INPUT_POST, "serial_number"),
            'coordinates' =>  $request->get(INPUT_POST, "coordinates"),
            'image' =>  $imageURL 
        ];
        $result = $machineModel->editMachine($data);
        $response->redirect("Location: /addlist");
        return $response;
    }

    // Para mostrar detalles máquina (To show machine details)
    public function machineId($request, $response, $container)
    {
        $machineId = $request->get(INPUT_GET, "machine_id");
        $machineModel = $container->get("Machine");
        $machine = $machineModel->getMachineById($machineId);
        $response->set('machine', $machine);
        $response->setTemplate("maquina.php");
        return $response;
    }

    // Buscar por id de la máquina (Search by machine id)
    public function showMachine($request, $response, $container)
    {
        $machineShow = $request->get(INPUT_GET, "machine_id");
        $machineModel = $container->get("Machine");
        $machines = $machineModel->getMachineById($machineShow);
        $response->set('machine', $machines);
        //var_dump($machines);
        //die();
        $response->setTemplate("maquina.php");
        return $response;
    }

    //Eliminar máquina (Delete machine)
    public function deleteMachine($request, $response, $container)
    {
        $machine_id = $request->getParam('id');
        $machineModel = $container->get("Machine");
        $result = $machineModel->deleteMachine($machine_id);
        $response->redirect("Location: /addlist");
        return $response;
    }

   //Buscador de máquinas (Machine Finder)
    public function searchMachines($request, $response, $container) {
        $query = $request->get(INPUT_GET, "query");
        $machineModel = $container->get("Machine");
        $results = $machineModel->searchMachine($query);
        header('Content-Type: application/json');
        echo json_encode($results);
        exit;
    }
}