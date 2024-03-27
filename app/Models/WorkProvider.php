<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class WorkProvider extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'provider_id',

    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }
    public function createManyImages($images)
    {
        foreach ($images as $image) {
            $this->images()->create(['image_name' => $image]);
        }
    }
}
