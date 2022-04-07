<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'password_changed_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class);
    }

    public function hasPermission(Permission $permission) // para verificar se te permissao
    {
        return $this->hasAnyRoles($permission->roles);
        /*
         * object with roles,  with a permission of view         *
         * view => Manager, Adm, Editor
         *
         * Carrega um objeto com as permissões de visualizar o post
         * view => Manager, Adm, Editor
         */
    }

    public function hasAnyRoles($roles)
    {
        /*
         * Check if user is Manager or Editor
         *
         * Verfica se o usuário tem as funções de Manager ou Editor
         */
        if (is_array($roles) || is_object($roles)){
            return !! $roles->intersect($this->roles)->count();
        }

        return $this->roles->contains('name', $roles);
    }
}
