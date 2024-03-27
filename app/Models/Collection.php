<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Collection extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
