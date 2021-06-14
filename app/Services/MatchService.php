<?php


namespace App\Services;


use App\Models\Match;
use App\Models\MatchTeam;
use App\Models\Scoreboard;
use App\Models\Tournament;
use App\Repository\MatchRepository;

class MatchService
{
    /**
     * @var VenueService
     */
    private $venueService;
    /**
     * @var TeamService
     */
    private $teamService;
    /**
     * @var TeamMatchService
     */
    private $teamMatchService;

    public function __construct(VenueService $venueService, TeamService $teamService, TeamMatchService $teamMatchService)
    {
        $this->venueService = $venueService;
        $this->teamService = $teamService;
        $this->teamMatchService = $teamMatchService;
    }

    public function saveOrUpdate($matches, $weekId)
    {
        foreach ($matches as $matchData) {
            $match = $matchData["@attributes"];
            $this->venueService->saveOrUpdate($match);
            $foundMatch = Match::firstOrNew(["id" => $match["id"], "week_id" => $weekId]);
            $foundMatch->id = $match["id"];
            $foundMatch->time = $match["time"];
            $foundMatch->date = $match["date"];
            $foundMatch->status = $match["status"];
            $foundMatch->venue_id = $match["venue_id"];
            $foundMatch->week_id = $weekId;
            $foundMatch->save();
            $this->teamService->saveOrUpdateLocalAndVisitor($matchData);
            $this->teamMatchService->saveOrUpdate($matchData);
        }
    }
}
