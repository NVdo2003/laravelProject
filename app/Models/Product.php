<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'product_name',
        'image',
        'price',
        'types_id',
        'categories_id',
        'brands_id',
    ];

    public function version(){
        return $this->hasMany(Version::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'types_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brands_id');
    }

}
