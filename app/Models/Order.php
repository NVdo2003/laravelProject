<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'OrderDate',
        'Status',
        'admins_id',
        'customers_id',
        'payment_methods_id'
    ];

    public function admin()
    {
        return $this->belongsTo(Type::class, 'admins_id');
    }

    public function customer()
    {
        return $this->belongsTo(Category::class, 'customers_id');
    }

    public function paymentMethods()
    {
        return $this->belongsTo(Brand::class, 'payment_methods_id');
    }

    public function orderDetails(){
        return $this->hasMany(DetailedOrders::class,'orders_id');
    }
}
