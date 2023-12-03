<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'detail_transactions', 'transaction_id', 'ticket_id')
            ->withPivot('jumlah_ticket', 'jumlah_harga_detail');
    }
}
