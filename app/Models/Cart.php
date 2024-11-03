<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'menu_item_id',
        'quantity',
    ];

    // Define the relationship with MenuItem model
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }

    // Optionally, define the relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
