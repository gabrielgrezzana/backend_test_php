<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class UserModel extends Authenticatable implements JWTSubject
{
    use Notifiable, HasApiTokens, HasFactory;

    protected $table = "users";
    public $incrementing = true;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $hidden = ['password'];
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
