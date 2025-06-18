<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Factories\BelongsTo;  
use App\Models\Role;


class Admin extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = ['role_id', 'name', 'email', 'password'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    } 

}

