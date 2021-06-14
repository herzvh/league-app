<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'm_played',
        'm_lost',
        'm_won',
        'm_drawn',
        'goals',
        'goal_diff',
        'points'
    ];
}
