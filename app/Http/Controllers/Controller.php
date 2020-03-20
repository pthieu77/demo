<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function instance($class)
    {
        try {
            $instantiator = new \Doctrine\Instantiator\Instantiator();
            $instance = $instantiator->instantiate($class);
            return $instance;
        } catch (\Exception $e) {
            return null;
        }
    }

    static public function writeLog($logname = "default", $msg  = null, $status = null, $models = null) {
        try {
            if (\Request::is('api/*') || \Request::is('*/webview/*')) {
                $user = auth('api')->user();
            } else {
                $user = Auth::user();
            }

            $log = activity($logname)->causedBy($user);

            if(!empty($models)) {
                $log = $log->performedOn($models);
            }

            if(!empty($status)) {
                $log = $log->withProperties(['status' => $status]);
            }

            if(!empty($msg)) {
                $log = $log->log($msg);
            }
            return $log;
        } catch (\Exception $e) {
            return null;
        }
    }


    static public function getAuthUser()
    {
        try {
            if (\Request::is('api/*') || \Request::is('*/webview/*')) {
                $user = auth('api')->user();
            } else {
                $user = Auth::user();
            }
            return $user;
        } catch(\Exception $e) {
            return;
        }
    }

    static public function hasAnyPermission($permission = [])
    {
        try {
            if (\Request::is('api/*') || \Request::is('*/webview/*')) {
                $user = auth('api')->user();
            } else {
                $user = Auth::user();
            }
            if ($user->hasAnyPermission($permission)) {
                return true;
            } else {
                return false;
            }
        } catch(\Exception $e) {
            return false;
        }
    }

    static public function hasAnyRoles($roles = [])
    {
        try {
            if (\Request::is('api/*') || \Request::is('*/webview/*')) {
                $user = auth('api')->user();
            } else {
                $user = Auth::user();
            }
            if ($user->hasAnyRole($roles)) {
                return true;
            } else {
                return false;
            }
        } catch(\Exception $e) {
            return false;
        }
    }

    static public function getRoleUser()
    {
        try {
            if (\Request::is('api/*') || \Request::is('*/webview/*')) {
                $roleName = auth('api')->user()->getRoleNames()->toArray();
            } else {
                $roleName = Auth::user()->getRoleNames()->toArray();
            }
            $roleName = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($roleName));
            return iterator_to_array($roleName, false);
        } catch(\Exception $e) {
            return [];
        }
    }

    static public function getPermissionUser()
    {
        try {
            if (\Request::is('api/*') || \Request::is('*/webview/*')) {
                $permissionName = auth('api')->user()->getPermissionsViaRoles()->toArray();
            } else {
                $permissionName = Auth::user()->getPermissionsViaRoles()->toArray();
            }
            $permissionName = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($permissionName));
            return iterator_to_array($permissionName, false);
        } catch(\Exception $e) {
            return [];
        }
    }

    static public function checkDistance($position = array(), $check = [])
    {
        try {
            $earth_radius = 6372.795477598;
            $latitude1 = (double)$position[0];
            $longitude1 = (double)$position[1];
            $latitude2 = $check[0];
            $longitude2 = $check[1];

            $dLat = deg2rad($latitude2 - $latitude1);
            $dLon = deg2rad($longitude2 - $longitude1);

            $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon / 2) * sin($dLon / 2);
            $c = 2 * asin(sqrt($a));
            $d = $earth_radius * $c;
            if ($d > app('setting_main')->limit_location) {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    static public function is_timestamp($timestamp)
    {
        try {
            if (strtotime(date('d-m-Y H:i:s', $timestamp)) === (int)$timestamp) {
                return true;
            } else return false;
        } catch (\Exception $e) {
            return false;
        }
    }

    static public function XORCipher($data)
    {
        try {
            $dataLen = strlen($data);
            $key = config('constant.XOR_KEY');
            $keyLen = strlen($key);
            $output = $data;

            for ($i = 0; $i < $dataLen; ++$i) {
                $output[$i] = $data[$i] ^ $key[$i % $keyLen];
            }

            return $output;
        } catch (\Exception $e) {
            return '';
        }
    }

    static public function Pagination($result, $page, $record = 10)
    {
        try {
            if ($record != null && $page != null) {
                $count_all = $result->count();
                $custom = collect(['recordsTotal' => $count_all, 'recordsFiltered' => $count_all]);
                $pagination = $result->paginate($record, ['*'], 'page', $page)->appends(Input::except('page'));
                $data = $custom->merge($pagination);
                return $data;
            } else {
                return $result->get();
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    static public function JsonExport($code, $msg, $data = null, $optinal = null)
    {
        try {
            $callback = [
                'code' => $code,
                'msg' => $msg
            ];
            if ($data != null) {
                $callback['data'] = $data;
            } else if (is_array($data) && count($data) == 0) {
                $callback['data'] = array();
            } else {
                $callback['data'] = (object)[];
            }
            if ($optinal != null && is_array($optinal)) {
                if (count($optinal) > 1) {
                    for ($i = 0; $i < count($optinal); $i++) {
                        $callback[$optinal[$i]['name']] = $optinal[$i]['data'];
                    }
                } else {
                    $callback[$optinal[0]['name']] = $optinal[0]['data'];
                }
            }
            return response()->json($callback, 200, []);
        } catch (\Exception $e) {
            return response()->json(['code' => 500, 'msg' => 'Internal Server Error'], 200, []);
        }
    }

    static public function EncodeJWT($user)
    {
        $time = time();
        $token = new \StdClass();
        $token->iat = $time;
        $token->uuid = self::uuid() . $time;
        $token->user = json_decode($user);
        return JWT::encode(json_decode(json_encode($token), true), Config::get('env.key_jwt'));
    }

    static public function DecodeJWT($request)
    {
        JWT::$leeway = 60;
        $decoded = JWT::decode($request->header('token'), Config::get('env.key_jwt'), array('HS256'));
        return $decoded;
    }

    public function encrypt($data)
    {
        try {
            $rsa = new RSA();
            $rsa->loadKey(\Storage::disk('key')->get('public.key'));
            $ciphertext = $rsa->encrypt($data);
            return base64_encode($ciphertext);
        } catch (\Exception $e) {
            return;
        }
    }

    public function decrypt($data)
    {
        try {
            $rsa = new RSA();
            $rsa->loadKey(\Storage::disk('key')->get('private.key'));
            $ciphertext = $rsa->decrypt(base64_decode($data));
            return $ciphertext;
        } catch (\Exception $e) {
            return '';
        }
    }
}
