<?php

namespace App\Http\Helpers\User\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Models;
use Illuminate\Http\Request;
use File;

class Helper extends Controller
{
    public function products_helper($request)
    {
        $group = 0;

        if ($request->has('group') && $request->group) {
            $group = $request->group;
        }

        try {
            $take = 4;
            $skip = $group * $take;
            
            $product = Models\Product::orderBy('id', 'desc')
                ->offset($skip)
                ->limit($take)
                ->select('id', 'image')->get();
            
            return $product;
        } catch (\Exception $e) {
            return [];
        }
    }

    public function product_helper($request)
    {
        $request_id = 0;

        if ($request->has('id') && $request->id) {
            $request_id = $request->id;
        }

        try {
            $product = Models\Product::where('id', $request_id)
                ->get();
            
            return $product;
        } catch (\Exception $e) {
            return [];
        }
    }
}
