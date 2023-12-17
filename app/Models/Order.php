<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Order extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = ['product_id', 'client_id', 'dateBuy'];

    protected $dates = ['deleted_at', 'dateBuy']; 

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
