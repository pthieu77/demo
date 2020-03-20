<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class Product extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'products';
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
        'title',
        'description',
        'image',
        'amount',
    ];
}