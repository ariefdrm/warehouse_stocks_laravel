<?php

namespace App\Models;

use App\Models\Items;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    //
    use HasFactory;
    protected $table = 'stocks';

    protected $fillable = [
        'items_id',
        'warehouse_id',
        'quantity',
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
}
