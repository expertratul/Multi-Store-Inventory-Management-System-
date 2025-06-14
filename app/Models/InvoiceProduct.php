<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    protected $fillable = [
        'qty',
        'sale_price',
        'user_id',
        'product_id',
        'invoice_id',
    ];

    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
