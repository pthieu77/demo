<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->instance = $this->instance(\App\Http\Helpers\Admin\Dashboard\Helper::class);
    }

    public function get_dashboard(Request $request)
    {
        try {
            return $this->instance->dashboard_helper($request);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
