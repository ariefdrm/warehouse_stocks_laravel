<?php

namespace App\Models;

use App\Models\Stocks;
use App\Models\StocksTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
    use HasFactory;

    protected $table = 'warehouse';
    protected $fillable = [
        'name',
        'location',
        'description',
    ];

    public function stocks()
    {
        return $this->hasMany(Stocks::class);
    }

    public function stockTransactions()
    {
        return $this->hasMany(StocksTransaction::class);
    }
}
