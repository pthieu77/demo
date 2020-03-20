<?php

namespace App\Http\Helpers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Models;
use Illuminate\Http\Request;
use File;

class Helper extends Controller
{
    public function datatables_helper($request)
    {
        try {
            $data = Models\Product::query();

            return Datatables::of($data)
                ->addColumn('action', function ($product) {
                    $action = '';
                    $action .= '<span class="text-info cursor-pointer btn-edit-product m-r-15" data-id='. $product->id .' data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></span>';
                    $action .= '<span class="text-danger cursor-pointer btn-trash-product" data-id='. $product->id .' data-toggle="tooltip" data-placement="top" title="Trash"><i class="fas fa-trash-alt"></i></span>';

                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error!');
        }
    }

    public function update_helper($request)
    {
        DB::beginTransaction();
        $isSaveFile = '';
        $file_public = '/img/product/';
        $file_public_extension = '.jpg';
        
        try {
            $data = [
                'name' => $request->name,
                'title' => $request->title,
                'amount' => $request->amount,
                'description' => $request->description,
                'image' => '',
            ];

            if ($request->has('type') && $request->type == 'create') {
                $product = Models\Product::create($data);

                if (!$product) {
                    DB::rollback();

                    if ($isSaveFile != '') {
                        if(File::exists($isSaveFile)) {
                            File::delete($isSaveFile);
                        }
                    }

                    return $this->JsonExport(500, 'Can not update product');
                }

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $file_public_extension = $file->getClientOriginalExtension();
                    $name = $product->id . '.' . $file_public_extension;
                    $image['filePath'] = $name;
                    $path_param = $file_public . $product->id . '/';
                    $path_folder = public_path() . $path_param;
                    
                    if(File::exists($path_folder . $name)) {
                        File::delete($path_folder . $name);
                    }
                    
                    $file->move($path_folder, $name);
                    $data['image'] = $path_param . $name;
                    $isSaveFile = $path_folder . $name;
                } else {
                    $data['image'] = '';
                }

                $product->update(['image' => $file_public . $product->id . '/' . $product->id . '.' . $file_public_extension]);
            }

            if ($request->has('type') && $request->type == 'update') {
                $product = Models\Product::where('id', $request->id)->first();

                // upload file
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $file_public_extension = $file->getClientOriginalExtension();
                    $name = $request->id . '.' . $file_public_extension;
                    $image['filePath'] = $name;
                    $path_param = $file_public . $request->id . '/';
                    $path_folder = public_path() . $path_param;
                    
                    if(File::exists($path_folder . $name)) {
                        File::delete($path_folder . $name);
                    }
                    
                    $file->move($path_folder, $name);
                    $data['image'] = $path_param . $name;
                    $isSaveFile = $path_folder . $name;
                } else {
                    $data['image'] = $product->image;
                }

                if ($product) {
                    $product->update($data);
                } else {
                    DB::rollback();
                    return $this->JsonExport(500, 'Can not update product');
                }
            }

            DB::commit();

            return $this->JsonExport(201, 'Update product success');
        } catch (\Exception $e) {
            DB::rollBack();

            if ($isSaveFile != '') {
                if(File::exists($isSaveFile)) {
                    File::delete($isSaveFile);
                }
            }

            return $this->JsonExport(500, 'Internal Server Error!');
        }
    }
    
    public function product_detail_helper($request)
    {
        try {
            $product = Models\Product::where('id', $request->id)->first();
            
            return $product;
        } catch (\Exception $e) {
            return [];
        }
    }

    public function product_delete_helper($request)
    {
        DB::beginTransaction();

        try {
            $product = Models\Product::where('id', $request->id);
            
            if ($product->count() > 0) {
                $product->delete();
                                        
                if (!$product) {
                    DB::rollback();
                    return $this->JsonExport(403, __('Delete false!'));
                }
            }
            
            DB::commit();
            
            return $this->JsonExport(201, __('Delete success.'));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->JsonExport(500, 'Internal Server Error!');
        }
    }
}
