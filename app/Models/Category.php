<?php

use App\Models\Items;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'name',
        'description',
    ];

    public function items()
    {
        return $this->hasMany(Items::class);
    }

    protected $guarded = [];
}
