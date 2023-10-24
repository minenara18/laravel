<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id', 'quantity'
    ];

    public function users()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
    public function products()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
