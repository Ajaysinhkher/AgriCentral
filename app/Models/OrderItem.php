<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;
use App\Models\Product;

class OrderItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['order_id','product_id','product_name','quantity','subtotal'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        $this->belongsTo(Product::class);
    }

}
