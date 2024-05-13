<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'user_id',
        'delivery_id',
        'grand_total',
        'payment_method',
        'shipping_cost',
        'percel_number',
        'status',
    ];
}

