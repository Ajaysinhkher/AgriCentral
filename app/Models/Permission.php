<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;   
use App\Models\Role;
use App\Models\Admin;
class Permission extends Model
{
    use HasFactory, SoftDeletes;

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = ['name', 'slug'];

    

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_permission');
    }   
}
