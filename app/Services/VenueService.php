<?php


namespace App\Services;


use App\Models\Match;
use App\Models\MatchTeam;
use App\Models\Scoreboard;
use App\Models\Tournament;
use App\Models\Venue;
use App\Repository\MatchRepository;

class VenueService
{
    public function __construct()
    {
    }

    public function saveOrUpdate($venue)
    {
        $foundVenue = Venue::firstOrNew(["id" => $venue["venue_id"]]);
        $foundVenue->id = $venue["venue_id"];
        $foundVenue->name = $venue["venue"];
        $foundVenue->city = $venue["venue_city"];
        $foundVenue->save();
    }
}
