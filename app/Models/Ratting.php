<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratting extends Model
{
    use HasFactory;

    protected $table = 'rattings';

    protected $fillable = [
        'user_id',
        'product_id',
        'rattings',
    ];
}
