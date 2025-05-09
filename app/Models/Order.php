<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date',
        'customer_name',
        'total_amount',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
