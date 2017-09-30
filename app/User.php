<?php

namespace App;

use Laravel\Passport\HasApiTokens; // Passport
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    private $num_page = 50;

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


    public function getUser($search = array())
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
                    );

        if (!empty ($search['id']))
        {
            $result = $result->where('users.id', $search['id']);
        }

        if (!empty ($search['name']))
        {
             $result = $result->where('users.name', 'LIKE', '%'.$search['name'].'%');
        }

        if (!empty ($search['email']))
        {
             $result = $result->where('users.email', 'LIKE', '%'.$search['email'].'%');
        }

        if (!empty ($search['gender']))
        {
             $result = $result->where('users.gender', 'LIKE', '%'.$search['gender'].'%');
        }

        if (!empty ($search['phone']))
        {
             $result = $result->where('users.phone', 'LIKE', '%'.$search['phone'].'%');
        }

        if (!empty ($search['updated_at']))
        {
             $result = $result->where('users.updated_at', 'LIKE', '%'.$search['updated_at'].'%');
        }

        if (!empty ($search['role_name']))
        {
            $result = $result->where('roles.role_name', 'LIKE', '%'.$search['role_name'].'%');
        }

        $data = array(
            'total' => $result->count(),
            'users' => $result->paginate($this->num_page)
        );

        return $data;
    }
}
