<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    protected $fillable = ['tournament_id','number'];

    /**
     * Get the tournament that owns the week.
     */
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
