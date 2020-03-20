<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->instance = $this->instance(\App\Http\Helpers\User\Product\Helper::class);
    }
    
    public function get_products(Request $request)
    {
        try {
            $data = $this->instance->products_helper($request);

            if (!$data) {
                $data = [];
            }

            return $this->JsonExport(200, 'Get product success.', $data);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
