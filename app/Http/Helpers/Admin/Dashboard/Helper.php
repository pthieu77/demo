<?php

namespace App\Http\Helpers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Models;
use Illuminate\Http\Request;
use File;

class Helper extends Controller
{
    public function dashboard_helper($request)
    {
        try {
            $data = [
                'label' => ['products', 'users', 'roles'],
                'data' => [
                    Models\Product::count(), 
                    Models\MUser::count(),
                    Models\Role::count(),
                ],
            ];

            return $this->JsonExport(200, 'Get dashboard success.', $data);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error!');
        }
    }
}
