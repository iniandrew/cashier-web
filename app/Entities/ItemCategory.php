<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
