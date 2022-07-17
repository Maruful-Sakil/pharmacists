<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable = ['pname', 'price', 'category', 'quantity'];
    protected $primaryKey = 'product_id';
    public $timestamps = false;
}
