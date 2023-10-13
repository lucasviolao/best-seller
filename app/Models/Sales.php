<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = ['seller_id', 'amount', 'sale_date'];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
