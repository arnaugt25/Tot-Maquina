<?php

/**
 * Front controler
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Aquest Framework implementa el mínim per tenir un MVC per fer pràctiques
 * de M07.
 * @author: Dani Prados dprados@cendrassos.net
 * @version 0.4.0
 *
 * Punt d'netrada de l'aplicació exemple del Framework Emeset.
 * Per provar com funciona es pot executer php -S localhost:8000 a la carpeta public.
 * I amb el navegador visitar la url http://localhost:8000/
 *
 */

use \Emeset\Contracts\Routers\Router;

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../vendor/autoload.php";
include "../App/Controllers/error.php";

/* Creem els diferents models */
$contenidor = new \App\Container(__DIR__ . "/../App/config.php");

$app = new \Emeset\Emeset($contenidor);
$app->middleware([\App\Middleware\App::class, "execute"]);


$app->route("/", "\App\Controllers\ctrlIndex:index");
$app->route("/profile", "\App\Controllers\ctrlProfile:profile");
$app->route("/admin", "\App\Controllers\ctrlAdmin:index");
$app->route("/formInci", "\App\Controllers\ctrlFormInci:index");
$app->route("/machine", "\App\Controllers\ctrlMachine:machine");
$app->route("/history", "\App\Controllers\ctrlHistory:history");
$app->get("/addmachine", "\App\Controllers\ctrlFormMachine:formMachine");
$app->post("/addmachine1", "\App\Controllers\ctrlFormMachine:ctrladdMachine");
$app->route("/addlist", "\App\Controllers\ctrlFormMachine:ctrlListMachine");
$app->get("/login", "\App\Controllers\ctrlLogin:login");
$app->post("/login", "\App\Controllers\ctrlLogin:ctrlLogin");
$app->post("/search", "\App\Controllers\ctrlSearch:search");
$app->get("/editprofile", "\App\Controllers\ctrlProfile:showEditForm");
$app->post("/profile/update", "\App\Controllers\ctrlProfile:processEditProfile");
$app->route("/logout", "\App\Controllers\ctrlLogin:logout");
$app->route("/notification", "\App\Controllers\ctrlNotification:index");
$app->route("/maintenance", "\App\Controllers\ctrlMaintenance:index");
$app->route("/listinci", "\App\Controllers\ctrlListinci:index");
$app->get("/admin/adduser", "\App\Controllers\ctrlAdminUser:index");
$app->post("/admin/adduser", "\App\Controllers\ctrlAdminUser:addUser");
$app->get("/admin/addmachine", "\App\Controllers\ctrlFormMachine:formMachine");
$app->post("/admin/addmachine", "\App\Controllers\ctrlFormMachine:ctrladdMachine");


$app->route(Router::DEFAULT_ROUTE, "ctrlError");
$app->execute();
