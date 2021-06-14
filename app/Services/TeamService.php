<?php


namespace App\Services;


use App\Models\Match;
use App\Models\MatchTeam;
use App\Models\Scoreboard;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\Venue;
use App\Repository\MatchRepository;

class TeamService
{
    public function __construct()
    {
    }

    public function saveOrUpdateLocalAndVisitor($match)
    {
        $localTeam = $match["localteam"]["@attributes"];
        $visitorTeam = $match["visitorteam"]["@attributes"];

        $foundLocalTeam = Team::firstOrNew(["id" => $localTeam["id"]]);
        $foundVisitorTeam = Team::firstOrNew(["id" => $visitorTeam["id"]]);

        // Set team's name and id
        $foundLocalTeam->id = $localTeam["id"];
        $foundVisitorTeam->id = $visitorTeam["id"];
        $foundLocalTeam->name = $localTeam["name"];
        $foundVisitorTeam->name = $visitorTeam["name"];

        // Set match played and goals
        $foundLocalTeam->goals = $foundLocalTeam->goals + $localTeam["ft_score"];
        $foundLocalTeam->m_played += 1;
        $foundVisitorTeam->goals = $foundVisitorTeam->goals + $localTeam["ft_score"];
        $foundVisitorTeam->m_played += 1;

        // set match won and drawn and goal diff
        if ($localTeam["ft_score"] > $visitorTeam["ft_score"]) {
            $foundLocalTeam->m_won = $foundLocalTeam->m_won + 1;
            $foundLocalTeam->points = $foundLocalTeam->points + 3;
            $foundLocalTeam->goal_diff = $foundLocalTeam->goal_diff + ($localTeam["ft_score"] - $visitorTeam["ft_score"]);
            $foundVisitorTeam->m_lost = $foundVisitorTeam->m_lost + 1;
        } else if ($localTeam["ft_score"] < $visitorTeam["ft_score"]) {
            $foundVisitorTeam->m_won = $foundVisitorTeam->m_won + 1;
            $foundVisitorTeam->points = $foundVisitorTeam->points + 3;
            $foundVisitorTeam->goal_diff = $foundVisitorTeam->goal_diff + ($visitorTeam["ft_score"] - $localTeam["ft_score"]);
            $foundLocalTeam->m_lost = $foundLocalTeam->m_lost + 1;
        } else if ($localTeam["ft_score"] === $visitorTeam["ft_score"]) {
            $foundVisitorTeam->m_drawn = $foundVisitorTeam->m_drawn + 1;
            $foundLocalTeam->m_drawn = $foundLocalTeam->m_drawn + 1;
            $foundVisitorTeam->points = $foundVisitorTeam->points + 1;
            $foundLocalTeam->points = $foundLocalTeam->points + 1;
        }

        $foundLocalTeam->save();
        $foundVisitorTeam->save();
    }
}
