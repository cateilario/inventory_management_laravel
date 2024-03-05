<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'location',
    ];

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
