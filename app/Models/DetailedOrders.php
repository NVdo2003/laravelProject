<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailedOrders extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['versions_id', 'orders_id','Amount', 'PriceVersion'];


    public function order(){
        return $this->belongsTo(Order::class , 'orders_id');
    }

    public function version(){
        return $this->belongsTo(Version::class, 'versions_id');
    }

}
