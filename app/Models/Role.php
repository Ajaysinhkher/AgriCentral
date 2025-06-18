<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = ['name', 'slug','is_super_admin'];

    
    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
    
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
