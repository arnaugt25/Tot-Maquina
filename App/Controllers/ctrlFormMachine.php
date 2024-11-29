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
            
            $response->redirect("Location: /list");
             
        } catch (\Exception $e) {
            $response->setSession("error", $e->getMessage());
            $response->redirect("Location: /list");
        }
        return $response;
    }

}
