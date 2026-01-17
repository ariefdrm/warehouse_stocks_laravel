<?php

namespace App\Models;

use App\Models\Items;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StocksTransaction extends Model
{
    //
    use HasFactory;

    protected $table = 'stocks_transaction';

    protected $fillable = [
        'items_id',
        'warehouse_id',
        'users_id',
        'type',        // IN | OUT | ADJUSTMENT
        'quantity',
        'note',
        'transaction_date',
    ];

    protected $casts = [
        'transaction_date' => 'datetime',
    ];

    /* ================= RELATION ================= */

    public function items()
    {
        return $this->belongsTo(Items::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
