<?php

namespace App\Http\Controllers\Admin\Errors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->instance = $this->instance(\App\Http\Helpers\Admin\Errors\Helper::class);
    }

    
}
