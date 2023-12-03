<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'transaction_id',
        'ticket_id',
        'jumlah_ticket',
        'jumlah_harga_detail',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
