<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'result_item_id', 'result_quantity'];

    public function resultItem()
    {
        return $this->belongsTo(Item::class, 'result_item_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Item::class, 'recipe_ingredient', 'recipe_id', 'item_id')->withPivot('quantity');
    }

    public function craftLogs()
    {
        return $this->hasMany(CraftLog::class);
    }
}
