<?php

use App\Libs\Session;
use App\Libs\View;

function dd($vars)
{
    dump($vars);
    die;
}
function dump($vars)
{
    echo "<style>body{background-color:#191919;font-size:.9rem;color:white;}</style>";
    echo "<pre >";
    var_dump($vars);
    echo "</pre>";
}

function string_starts_with(string $haystack, string $needle): bool
{
    return 0 === strncmp($haystack, $needle, \strlen($needle));
}

function root_path(string $folder = "")
{
    return BASE_PATH . $folder;
}

function view_path(string $path = "")
{
    return root_path("/app/Views/{$path}");
}

function render(string $template, array $data = [])
{
    return View::render($template, $data);
}

function asset($asset = "")
{
    return BASE_URL . "public/assets/" . $asset;
}

function route($route = "")
{
    return BASE_URL . "public" . $route;
}

function redirect($redirect = "")
{
    $redirect = route($redirect);
    header("Location: {$redirect}");
    die();
}

function session_get($key)
{
    return Session::get($key);
}

function build_badge($status)
{
    $estado = getStatus($status);
    return "<span class='badge rounded-pill {$estado[1]}'>{$estado[0]}</span>";
}
function getStatus($status)
{
    switch ($status) {
        case 0:
            return ["Desactivado", 'text-bg-danger'];
            break;
        case 1:
            return ["Activado", 'text-bg-success'];
            break;
        default:
            return ["Desconocido", 'text-bg-info'];
            break;
    }
}
