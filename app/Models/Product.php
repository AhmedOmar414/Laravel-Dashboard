<?php

namespace App\Models;

use App\Http\Controllers\Dashbord\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_name',
        'product_description',
        'purchase_price',
        'sale_price',
        'stock',
        'image_path'
    ];

    public $appends=['profit','image'];

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function getProfitAttribute(){
        $purchase_price = $this->purchase_price;
        $sale_price = $this->sale_price;
        $profit = (($sale_price-$purchase_price)*100)/$purchase_price;
        return number_format($profit,1);

    }

    public function getImageAttribute(): string
    {
        return asset('uploads/products_images/'.$this->image_path);
    }
}
