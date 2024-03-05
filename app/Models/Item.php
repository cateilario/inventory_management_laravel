<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'picture',
        'box_id',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function activeLoan()
    {
        return $this->loans()->whereNull('returned_date')->first();
    }
}
