<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class Role extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'roles';
    protected $dateFormat = "Y-m-d";
    public static $snakeAttributes = false;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'display_name',
    ];

    /**
     * A role may be given various permissions.
     */
    public  function users() {
        return $this->hasMany(MUser::class);
    }
}
