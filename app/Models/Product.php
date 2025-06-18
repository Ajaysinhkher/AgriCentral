<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','slug','description','price','stock','image','status'];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'product_categories');
    }

   
}
