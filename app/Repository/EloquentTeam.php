<?php


namespace App\Repository;



use App\Models\Team;
use Illuminate\Support\Facades\DB;

class EloquentTeam implements TeamRepository
{
    public function getAllTeams()
    {
        return DB::select(DB::raw('
            select * from teams order by points desc
        '));
    }
}
