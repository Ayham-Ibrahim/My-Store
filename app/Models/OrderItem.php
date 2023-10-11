<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price_per_item',
        'price',
    ];



  public function products()
  {
      return $this->hasOne(Product::class, 'product_id', 'id');
  }
}
