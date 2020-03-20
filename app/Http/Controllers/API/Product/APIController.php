<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth.api', ['except' => ['api.auth.login']]);
        $this->instance = $this->instance(\App\Http\Helpers\API\Product\Helper::class);
    }

    
    public function get_products(Request $request)
    {
        try {
            $data = $this->instance->products_helper($request);
            
            if (!$data) {
                $data = [];
            }

            return $this->JsonExport(200, 'Get products success.', $data);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
