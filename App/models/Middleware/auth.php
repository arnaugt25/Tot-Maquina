<?php

namespace App\Middleware;

use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

/**
 * Middleware que gestiona l'autenticació
 *
 * @param \Emeset\Contracts\Http\Request $request petició HTTP
 * @param \Emeset\Contracts\Http\Response $response resposta HTTP
 * @param \Emeset\Contracts\Container $container  
 * @param callable $next  següent middleware o controlador.   
 * @return \Emeset\Contracts\Http\Response resposta HTTP
 */
class auth {
    public static function auth(Request $request, Response $response, Container $container, $next) : Response
    {
        $usuari = $request->get("SESSION", "usuari");
        $logat = $request->get("SESSION", "logat");

        if (!isset($logat)) {
            $usuari = "";
            $logat = false;
        }

        $response->set("usuari", $usuari);
        $response->set("logat", $logat);

        if ($logat) {
            $response = \Emeset\Middleware::next($request, $response, $container, $next);
        } else {
            $_SESSION['error'] = "Debe iniciar sesión para acceder a esta página.";
            $response->setTemplate("forbidden.php");
        }
        return $response;
    }

    public static function admin(Request $request, Response $response, Container $container, $next) : Response 
    {
        // Verificamos si el usuario está logado
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Debes iniciar sesión para acceder al panel de administración.";
            $response->setTemplate("forbidden.php");
            return $response;
        }

        // Verificamos si el usuario es admin
        if ($_SESSION['user']['role'] !== 'admin') {
            $_SESSION['error'] = "Acceso denegado. Debe ser administrador.";
            $response->setTemplate("forbidden.php");
            return $response;
        }

        // Si es admin y está logado, continuamos
        $response = \Emeset\Middleware::next($request, $response, $container, $next);
        return $response;
    }

    function tecnico(Request $request, Response $response, Container $container, $next) : Response {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Debes iniciar sesión para acceder a esta sección.";
            $response->setTemplate("forbidden.php");
            return $response;
        }

        if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'tecnico') {
            $_SESSION['error'] = "No tienes permisos para acceder a esta sección.";
            $response->setTemplate("forbidden.php");
            return $response;
        }

        $response = \Emeset\Middleware::next($request, $response, $container, $next);
        return $response;
    }

    function supervisor(Request $request, Response $response, Container $container, $next) : Response {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Debes iniciar sesión para acceder a esta sección.";
            $response->setTemplate("forbidden.php");
            return $response;
        }

        if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'supervisor') {
            $_SESSION['error'] = "No tienes permisos para acceder a esta sección.";
            $response->setTemplate("forbidden.php");
            return $response;
        }

        $response = \Emeset\Middleware::next($request, $response, $container, $next);
        return $response;
    }

    function isUser(Request $request, Response $response, Container $container, $next) : Response{
        $user = $request->get("SESSION", "user"); // Get user from session
        $logged = $request->get("SESSION", "logged"); // Check if user is logged in

        if($user["role"] == "user" && $logged){
            $response->setTemplate("forbidden.php"); // Redirect if user is a regular user
        }
        else {
            return \Emeset\Middleware::next($request, $response, $container, $next); // Proceed if not a regular user
        }
        return $response; // Return the response
    }
}
