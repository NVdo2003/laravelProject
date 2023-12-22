<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'Version_name',
        'image',
        'price',
        'quantity',
        'Version_details',
        'products_id',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

}
