<?php

namespace App\Models;

use App\Libs\Orm;

class Usuario extends Orm
{
    protected $table = "usuario";

    function __construct() {
        parent::__construct();
    }

}
