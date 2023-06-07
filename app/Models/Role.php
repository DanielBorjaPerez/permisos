<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\User;


class Role extends Model
{
    use HasFactory;

    public function users()
    {
        return $this
            ->belongsToMany(User::class)
            ->withTimestamps();
    }

    public function permissions()
    {
        return $this
            ->belongsToMany(Permission::class)
            ->withTimestamps();
    }

    public function hasPermission($permission)
    {
        if ($this->permissions()->where('keyname', $permission)->first()) {
            return true;
        }
        return false;
    }
}
