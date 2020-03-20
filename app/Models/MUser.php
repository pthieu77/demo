<?php

/**
 * Created by Aris Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class MUser extends Authenticatable implements JWTSubject
{
    use Notifiable;
	use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'users';
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'status' => 'int',
        'email_verified_at' => 'datetime',
	];

	protected $hidden = [
		'password',
		'remember_token',
        'deleted_at',
        'created_at',
        'updated_at',
	];

	protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role_id',
	];
    
    public  function role() {
        return $this->belongsTo(Role::class);
    }

    public  function isAdmin() {
        return $this->role()->where('name', 'admin')->exists();
    }

    public  function isUser() {
        return $this->role()->where('name', 'user')->exists();
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
