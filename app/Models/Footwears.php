<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Footwears extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['category', 'name', 'price', 'description', 'image'];
}