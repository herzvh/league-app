<?php


namespace App\Services;


use App\Models\Match;
use App\Models\MatchTeam;
use App\Models\Scoreboard;
use App\Models\Tournament;
use App\Models\Week;
use App\Repository\MatchRepository;

class WeekService
{
    /**
     * @var MatchService
     */
    private $matchService;

    public function __construct(MatchService $matchService)
    {
        $this->matchService = $matchService;
    }

    public function saveOrUpdate($weeks, $tournamentId)
    {
        foreach ($weeks as $weekData) {
            $week = $weekData["@attributes"];
            $foundWeek = Week::firstOrNew(["number" => $week["number"], "tournament_id" => $tournamentId]);
            $foundWeek->number = $week["number"];
            $foundWeek->tournament_id = $tournamentId;
            $foundWeek->save();
            $this->matchService->saveOrUpdate($weekData["match"], $foundWeek["id"]);
        }
    }
}
