<?php

namespace App\Models;

use App\Http\Controllers\Dashbord\ProductController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    public function product(){
       return $this->hasMany(Product::class);
    }
}
