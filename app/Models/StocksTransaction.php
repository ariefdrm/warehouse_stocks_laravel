<?php

use App\Models\Items;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StocksTransaction extends Model
{
    //
    use HasFactory;

    protected $table = 'stocks_transaction';

    protected $fillable = [
        'item_id',
        'warehouse_id',
        'user_id',
        'type',        // IN | OUT | ADJUSTMENT
        'quantity',
        'note',
        'transaction_date',
    ];

    protected $casts = [
        'transaction_date' => 'datetime',
    ];

    /* ================= RELATION ================= */

    public function item()
    {
        return $this->belongsTo(Items::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
