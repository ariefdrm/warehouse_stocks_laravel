<?php

use App\Models\Items;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'item_id',
        'warehouse_id',
        'quantity',
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
}
