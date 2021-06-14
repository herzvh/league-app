<?php


namespace App\Services;


use App\Models\Match;
use App\Models\MatchTeam;
use App\Models\Scoreboard;
use App\Models\Tournament;
use App\Repository\MatchRepository;

class TournamentService
{
    /**
     * @var WeekService
     */
    private $weekService;

    public function __construct(WeekService $weekService)
    {
        $this->weekService = $weekService;
    }

    public function saveOrUpdate($data)
    {
        $tournament = $data["tournament"];
        $attributes = $tournament["@attributes"];
        $foundTournament = Tournament::firstOrNew(['id' => $attributes['id']]);
        $foundTournament->league = $attributes["id"];
        $foundTournament->league = $attributes["league"];
        $foundTournament->season = $attributes["season"];
        $foundTournament->is_current = !!$attributes["is_current"];
        $foundTournament->save();
        $this->weekService->saveOrUpdate($tournament["week"], $attributes["id"]);
    }
}
