<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryConcert extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function concerts()
    {
        return $this->belongsToMany(Concert::class);
    }
}
