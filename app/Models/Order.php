<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'products',
        'amount',
        'quantity',
        'payment_reference',
        'payment_status',
        'dispatch_status',
        'location',
    ];
}
