<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['Brand_name'];
    protected $primaryKey = 'brand_id';
    public function products(){
        return $this->hasMany(Product::class);
    }
}
