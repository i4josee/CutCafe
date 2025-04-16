<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_time',
        'customer_name',
        'total_amount',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
