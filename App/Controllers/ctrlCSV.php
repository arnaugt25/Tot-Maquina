<?php

namespace App\Controllers;

use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

class ctrlCSV
{
    public function uploadCSV($request, $response, $container)
    {
            if (!isset($_FILES['csv_file']) || $_FILES['csv_file']['error'] !== 0) {
                $response->setJson([
                    'success' => false,
                    'message' => 'No se ha subido ningún archivo o hay un error en la subida'
                ]);
                return $response;
            }

            $file = $_FILES['csv_file']['tmp_name'];
            if (!file_exists($file)) {
                $response->setJson([
                    'success' => false,
                    'message' => 'El archivo temporal no existe'
                ]);
                return $response;
            }

            $machineModel = $container->get('Machine');
            $importedCount = 0;
            $errors = [];

            if (($handle = fopen($file, "r")) !== FALSE) {
                fgetcsv($handle, 1000, ","); // Skip header row

                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        if (count($data) < 5) {
                            $errors[] = "Línea con datos insuficientes: " . implode(',', $data);
                            continue;
                        }

                        $machineData = [
                            'model' => trim($data[0]),
                            'created_by' => trim($data[1]),
                            'installation_date' => trim($data[2]),
                            'serial_number' => trim($data[3]),
                            'coordinates' => trim($data[4]),
                            'image' => ''
                        ];

                        if ($machineModel->addMachine($machineData)) {
                            $importedCount++;
                        } else {
                            $errors[] = "Error al insertar la máquina: " . implode(',', $data);
                        }
                }
                fclose($handle);
            }

            $response->setJson([
                'success' => $importedCount > 0,
                'message' => $importedCount > 0 
                    ? "Se importaron $importedCount máquinas correctamente" 
                    : "No se pudo importar ninguna máquina",
                'errors' => $errors,
                'imported' => $importedCount
            ]);

        return $response;
    }
} 