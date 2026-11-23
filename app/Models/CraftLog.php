<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CraftLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['player_id', 'recipe_id', 'created_at'];

    protected $casts = ['created_at' => 'datetime'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }
}
