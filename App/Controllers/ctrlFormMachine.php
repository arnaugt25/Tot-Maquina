<?php

namespace App\Controllers;

class ctrlFormMachine
{
    //MOSTRAR EL FORM DE AÑADIR MAQUINA 
    public function formMachine($request, $response, $container)
    {
        $response->setTemplate("formMachine.php");
        return $response;
    }

    //AÑADIR MAQUINA A LA BASE DE DATOS DESDE EL FORM
    public function ctrladdMachine($request, $response, $container)
    {
        $model = $request->get(INPUT_POST, "model");
        $createdby = $request->get(INPUT_POST, "created_by");
        $dateinstall = $request->get(INPUT_POST, "installation_date");
        $serialnum = $request->get(INPUT_POST, "serial_number");
        $coordinates = $request->get(INPUT_POST, "coordinates");

        // Manejo simple de la imagen
        $imageURL = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/images';
            $imageName = basename($_FILES['image']['name']);
            $targetPath = $uploadDir . $imageName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imageURL = '/' . $targetPath;
            }
        }
        //Array de los datos
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

    //MOSTRAR LA MAQUINA EN LISTA DE MAQUINAS CON LA INFO DE LA BDD
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

    //MOSTRAR FORM EDITAR MAQUINA
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

    //PARA EDITAR LA MAQUINA 
    public function editaMachine($request, $response, $container)
    {
        // Get id 
        $machineId = $request->get(INPUT_GET, "machine_id");
        // die();
        $machineModel = $container->get("Machine");
        $machine = $machineModel->editMachine($machineId);
        $response->set('machine', $machine);
        $response->setTemplate("editMachine.php");
        return $response;
    }

    //PARA HACER EL UPDATE EN LA BASE DE DATOS 
    public function updateMachine($request, $response, $container)
    {
        $machineId = $request->get(INPUT_GET, "machine_id");
        $machineModel = $container->get("Machine");
    
        // Obtener los datos actuales de la máquina
        $currentMachine = $machineModel->getMachineById($machineId);
    
        // Manejo de la imagen
        $imageURL = $currentMachine['image']; // Mantener la imagen actual por defecto
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            $imageName = basename($_FILES['image']['name']);
            $targetPath = $uploadDir . $imageName;
    
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imageURL = '/' . $targetPath; // Actualizar la URL de la imagen si se sube una nueva
            }
        }
    
        $data = [
            'machine_id' => $machineId,
            'model' => $request->get(INPUT_POST, "model"),
            'created_by' => $request->get(INPUT_POST, "created_by"),
            'installation_date' => $request->get(INPUT_POST, "installation_date"),
            'serial_number' => $request->get(INPUT_POST, "serial_number"),
            'coordinates' =>  $request->get(INPUT_POST, "coordinates"),
            'image' =>  $imageURL // Usar la URL de la imagen actualizada
        ];
    
        $result = $machineModel->editMachine($data);
    
        $response->redirect("Location: /addlist");
        return $response;
    }

    // Para mostrar máquina 
    public function machineId($request, $response, $container)
    {
        $machineId = $request->get(INPUT_GET, "machine_id");
        $machineModel = $container->get("Machine");
        $machine = $machineModel->getMachineById($machineId);
        $response->set('machine', $machine);

        $response->setTemplate("maquina.php");
        return $response;
    }

    // Buscar por id de la máquina
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

    //Eliminar máquina
    public function deleteMachine($request, $response, $container)
    {
        $machine_id = $request->getParam('id');
        $machineModel = $container->get("Machine");
        $result = $machineModel->deleteMachine($machine_id);
        $response->redirect("Location: /addlist");

        return $response;
    }
}
