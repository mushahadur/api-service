<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

   
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
