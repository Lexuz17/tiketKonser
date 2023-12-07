<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'metode_pembayaran',
        'nomor_kartu',
        'nama_bank',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
