<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getUser($search_data = array()) 
    {
        $result = \DB::table('users')
                     ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
                     ->select(
                        'users.id',
                        'users.name',
                        'users.email',
                        'users.gender',
                        'users.updated_at',
                        'users.avatar',
                        'users.phone',
                        'roles.role_name'
                    )
                     ->paginate(50);
        return $result;
    }
}
