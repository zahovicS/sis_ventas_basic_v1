<?php

namespace App\Models;

use App\Libs\Orm;

class Productos extends Orm
{
    protected $table = "producto";

    function __construct() {
        parent::__construct();
    }

}
