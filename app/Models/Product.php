<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Categories Many to Many
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    // Tags Many to Many
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    // Colors Many to Many
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withTimestamps();
    }
    // Sizes Many to Many
    public function sizes()
    {
        return $this->belongsToMany(Size::class)->withTimestamps();
    }

    // Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
