<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'type'];

    public function players()
    {
        return $this->belongsToMany(User::class, 'inventories', 'item_id', 'player_id')->withPivot('quantity');
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'result_item_id');
    }
}
