<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    // Linking category model in product model by category_id
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
