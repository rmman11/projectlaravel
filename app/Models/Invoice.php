<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $fillable = [
    'invoice_number',
    'customer_name',
    'customer_email',
    'invoice_date',
    'total',
];

    protected $casts = [
    'invoice_date' => 'date',
];

public function items()
{
    return $this->hasMany(\App\Models\InvoiceItem::class);
}



}
