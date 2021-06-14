<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'league', 'season', 'is_current'];

    /**
     * Get the weeks for the tournament.
     */
    public function weeks()
    {
        return $this->hasMany(Week::class);
    }
}
