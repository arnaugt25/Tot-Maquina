<?php

namespace App\Controllers;

class ctrlFormMachine {

    public function formMachine($request, $response, $container){

        $response->setTemplate("formMachine.php");

        return $response;
    }

    public function ctrladdMachine($request, $response, $container){
        try {
            $model = $request->get(INPUT_POST, "model");
            $createdby = $request->get(INPUT_POST, "created_by");
            $dateinstall = $request->get(INPUT_POST, "installation_date"); 
            $serialnum = $request->get(INPUT_POST, "serial_number"); 
            // Manejo simple de la imagen
            $imageURL = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
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
                'image' => $imageURL
            ];
            $machineModel = $container->get("Machine");
            $machine = $machineModel->addMachine($machineData);

            $response->setSession('machine', $machine);
            
            $response->redirect("Location: /addlist");

        } catch (\Exception $e) {
            $response->setSession("error", $e->getMessage());
            $response->redirect("Location: /list");
        }
        return $response;
    }

    public function ctrlListMachine($request, $response, $container) {
        try {
            $machineModel = $container->get("Machine");
            // var_dump($machineModel);
            // die();
            $machines = $machineModel->listMachine();
            
            $response->set('machines', $machines);
            $response->setTemplate("machinelist.php");
            
        } catch (\Exception $e) {
            $response->setSession("error", $e->getMessage());
            $response->redirect("Location: /list");
        }
        return $response;
    }
    

    // Para mostrar máquina 
   public function machineId($request, $response, $container){

      $response->setTemplate("maquina.php");

        return $response;
   }

    // Buscar por id de la máquina
    public function showMachine($request, $response, $container) {
        $machineShow = $request->get(INPUT_GET, "machine_id");
        
        $machineModel = $container->get("Machine");
        $machines = $machineModel->getMachineById($machineShow);
        
        $response->set('machine', $machines);
        //var_dump($machines);
        //die();

        $response->setTemplate("maquina.php");
        return $response;
    }
}
