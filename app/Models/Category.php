<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name','slug','status'];

    public function products()
    {
        $this->belongsToMany(Product::class,'product_categories');
    }
}
