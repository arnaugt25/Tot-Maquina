<?php

/**
 * Front controler
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Aquest Framework implementa el mínim per tenir un MVC per fer pràctiques
 * de M07.
 * @author: Dani Prados dprados@cendrassos.net
 * @version 0.4.0
 */

use \Emeset\Contracts\Routers\Router;

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../vendor/autoload.php";
include "../App/Controllers/error.php";

/* Creem els diferents models */
$contenidor = new \App\Container(__DIR__ . "/../App/config.php");

$app = new \Emeset\Emeset($contenidor);
$app->middleware([\App\Middleware\App::class, "execute"]);

// Rutas básicas
$app->route("/", [\App\Controllers\ctrlIndex::class, "index"]);
$app->route("/profile", [\App\Controllers\ctrlProfile::class, "profile"]);
$app->route("/admin", [\App\Controllers\ctrlAdmin::class, "index"]);

// Rutas de formularios e incidencias
$app->route("/forminci", [\App\Controllers\ctrlFormInci::class, "index"]);
$app->route("/forminci", [\App\Controllers\ctrlFormInci::class, "ctrlFormInci"]);
$app->post("/incidencias/crear", [\App\Controllers\ctrlListinci::class, "create"]);
$app->get("/admin/editinci/{id}", [\App\Controllers\ctrlListinci::class, "editMaintenance"]);
$app->post("/maintenances/update/{id}", [\App\Controllers\ctrlListinci::class, "updateMaintenance"]);
$app->get("/maintenances/delete/{id}", [\App\Controllers\ctrlListinci::class, "deleteMaintenance"]);
$app->route("/listinci", [\App\Controllers\ctrlListinci::class, "index"]);
$app->route("/maintenance", "\App\Controllers\ctrlMaintenance:index");

// Rutas de máquinas
$app->get("/addmachine", [\App\Controllers\ctrlFormMachine::class, "formMachine"]);
$app->post("/addmachine1", [\App\Controllers\ctrlFormMachine::class, "ctrladdMachine"]);
$app->route("/addlist", [\App\Controllers\ctrlFormMachine::class, "ctrlListMachine"]);
$app->get("/editmachine", [\App\Controllers\ctrlFormMachine::class, "editMachine"]);
$app->post("/updatemachine", [\App\Controllers\ctrlFormMachine::class, "updateMachine"]);
$app->get("/maquina_id", [\App\Controllers\ctrlFormMachine::class, "machineId"]);
$app->route("/delete/{id}", [\App\Controllers\ctrlFormMachine::class, "deleteMachine"]);


$app->get('/generate_machine_qr/{id}', [\App\Controllers\CtrlGenerateMachineQR::class, "generateQR"]);
$app->post('/uploadcsv', [\App\Controllers\ctrlCSV::class, "uploadCSV"]);
$app->get("/search-machines", [\App\Controllers\ctrlFormMachine::class, "searchMachines"]);

// Rutas de autenticación y perfil
$app->get("/login", [\App\Controllers\ctrlLogin::class, "login"]);
$app->post("/login", [\App\Controllers\ctrlLogin::class, "ctrlLogin"]);
$app->route("/logout", [\App\Controllers\ctrlLogin::class, "logout"]);
$app->get("/editprofile", [\App\Controllers\ctrlProfile::class, "showEditForm"]);
$app->post("/profile/update", [\App\Controllers\ctrlProfile::class, "processEditProfile"]);

// Rutas de búsqueda y notificaciones
$app->route("/forminci/{id}", [\App\Controllers\ctrlFormInci::class, "index"]);
$app->route("/forminci/{id}", [\App\Controllers\ctrlFormInci::class, "ctrlFormInci"]);
$app->post("/incidencias/crear", [\App\Controllers\ctrlListinci::class, "create"]);
$app->get("/admin/editinci/{id}", [\App\Controllers\ctrlListinci::class, "editMaintenance"]);
$app->post("/maintenances/update/{id}", [\App\Controllers\ctrlListinci::class, "updateMaintenance"]);
$app->get("/maintenances/delete/{id}", [\App\Controllers\ctrlListinci::class, "deleteMaintenance"]);
$app->route("/listinci", [\App\Controllers\ctrlListinci::class, "index"]);
$app->route("/maintenance", "\App\Controllers\ctrlMaintenance:index");
$app->route("/notify", [\App\Controllers\ctrlNotification::class, "notification"]);




// Rutas de mantenimiento e historial
$app->route("/maintenance", [\App\Controllers\ctrlMaintenances::class, "maintenance"]);
$app->get("/history1", [\App\Controllers\ctrlHistory::class, "history"]);
$app->route("/history/{id}", [\App\Controllers\ctrlHistory::class, "showhistory"]);
///////////////////////////////
// $app->route("/prueba/{id}", [\App\Controllers\ctrlHistory::class, "showMaintenances"]);



// Rutas de administración
$app->get("/admin/adduser", [\App\Controllers\ctrlAdminUser::class, "index"]);
$app->post("/admin/adduser", [\App\Controllers\ctrlAdminUser::class, "addUser"]);
$app->get("/admin/addmachine", [\App\Controllers\ctrlFormMachine::class, "formMachine"]);
$app->post("/admin/addmachine", [\App\Controllers\ctrlFormMachine::class, "ctrladdMachine"]);
$app->get("/admin/edituser/{id}", [\App\Controllers\ctrlAdminUser::class, "formEditUser"]);
$app->post("/admin/edituser/{id}", [\App\Controllers\ctrlAdminUser::class, "editUser"]);
$app->get("/admin/deleteuser/{id}", [\App\Controllers\ctrlAdminUser::class, "deleteUser"]);
$app->get("/admin/deletemachine/{id}", [\App\Controllers\ctrlFormMachine::class, "deleteMachine"]);
$app->get("/admin/deleteinci/{id}", [\App\Controllers\ctrlListinci::class, "deleteMaintenance"]);
$app->route("/admin/forminci", [\App\Controllers\ctrlFormInci::class, "index"]);
$app->route("/admin/forminci", [\App\Controllers\ctrlFormInci::class, "ctrlFormInci"]);


// Ruta por defecto (error)
$app->route(Router::DEFAULT_ROUTE, "ctrlError");
$app->execute();