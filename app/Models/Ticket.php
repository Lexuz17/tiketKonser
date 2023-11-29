<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function concert()
    {
        return $this->belongsTo(Concert::class);
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'detail_transactions', 'ticket_id', 'transaction_id')
            ->withPivot('jumlah_ticket', 'total_harga_detail');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'detail_carts');
    }
}
