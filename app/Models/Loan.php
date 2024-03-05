<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->hasOne(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}