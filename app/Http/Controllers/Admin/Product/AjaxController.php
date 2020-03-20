<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->instance = $this->instance(\App\Http\Helpers\Admin\Product\Helper::class);
    }

    public function get_datatables(Request $request)
    {
       try {
            $data = $this->instance->datatables_helper($request);

            if (!$data) {
                $data = [];
            }

            return $data;
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }

    public function post_product(Request $request)
    {
        try {
            $rules = array(
                'name' => 'required',
                'title' => 'required',
                'amount' => 'required',
                'description' => 'required',
            );

            if ($request->has('type') && $request->type == 'update') {
                $rules['id'] = 'required';
            }

            if ($request->has('type') && $request->type == 'create') {
                $rules['image'] = 'required';
            }
            
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
               // return $this->JsonExport(403, 'Product post is invalid.');
                return $this->JsonExport(403, $validator->messages()->get('*'));
            }
            
            return $this->instance->update_helper($request);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
    
    public function get_product_detail(Request $request)
    {
       try {
            $data = $this->instance->product_detail_helper($request);

            if (!$data) {
                $data = [];
            }

            return $this->JsonExport(200, 'Get product success.', $data);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }

    public function delete_product(Request $request)
    {
       try {
            return $this->instance->product_delete_helper($request);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
