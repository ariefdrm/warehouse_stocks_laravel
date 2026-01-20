<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Stocks;
use App\Models\StocksTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sku',
        'unit',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stocks::class);
    }

    public function stockTransactions()
    {
        return $this->hasMany(StocksTransaction::class);
    }

    protected $guarded = [];
}
