<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'collection_id',
        'name',
        'price',
        'description',
        'size'
    ];


    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
    public function bouquets()
    {
        return $this->belongsToMany(Bouquet::class, 'bouquet_products')->withPivot('quantity');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function createManyImages($images)
    {
        foreach ($images as $image) {
            $this->images()->create(['image_name' => $image]);
        }
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
