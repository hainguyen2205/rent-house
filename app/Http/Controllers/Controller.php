<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public $jss = [];
    use AuthorizesRequests, ValidatesRequests;
    public function addJs($js)
    {
        $this->jss[] = $js;
    }
}
