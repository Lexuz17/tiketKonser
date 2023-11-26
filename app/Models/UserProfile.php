<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'gambar',
        'nama_lengkap',
        'no_telp',
        'gender',
        'dob',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
