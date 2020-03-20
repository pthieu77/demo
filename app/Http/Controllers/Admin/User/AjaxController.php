<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;

class AjaxController extends Controller
{
	public function __construct()
    {
        $this->instance = $this->instance(\App\Http\Helpers\Admin\Product\Helper::class);
    }

    public function get_list_user(Request $request)
    {
    	try {
            $rules = array(
                'name' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->JsonExport(403, __('Validation Error'));
            }
            
            return $this->instance->post_product_helper($request);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
