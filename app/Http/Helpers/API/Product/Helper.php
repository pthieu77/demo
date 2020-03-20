<?php

namespace App\Http\Helpers\API\Product;

use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models;
use \stdClass;

class Helper extends Controller
{
    public function products_helper($request)
    {
        try {
            $data = Models\Product::query()->get();

            return $data;
        } catch (\Exception $e) {
            return null;
        }
    }
    
}
