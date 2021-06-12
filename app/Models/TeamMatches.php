<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMatches extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'score',
        'ft_score',
        'et_score',
        'pen_score'
    ];
}
