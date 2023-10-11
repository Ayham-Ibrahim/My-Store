<?php

namespace App\Models;

use App\Traits\ProductPhotoTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ProductPhotoTrait;

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'description',
        'photo',
        'quantity'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
