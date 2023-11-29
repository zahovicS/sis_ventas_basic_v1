<?php

namespace App\Libs;

use Exception;

class Controller {
    public function view(string $template, array $data = [], $layouts = "site"){
        return View::view($template,$data,$layouts);
    }
}