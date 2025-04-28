<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\HasRolesAndPermissions;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasRolesAndPermissions;
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "admins";
    protected $guard = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'status',
        'image',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function status()
    {
        return $this->status =='active'?'Active':'Inactive' ;
    }

}
