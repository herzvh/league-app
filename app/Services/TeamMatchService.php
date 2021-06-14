<?php


namespace App\Services;


use App\Models\TeamMatches;

class TeamMatchService
{
    public function __construct()
    {
    }

    public function saveOrUpdate($match)
    {
        $localTeam = $match["localteam"]["@attributes"];
        $visitorTeam = $match["visitorteam"]["@attributes"];
        $matchData = $match["@attributes"];

        $foundLocalTeam = TeamMatches::firstOrNew([
            "team_id" => $localTeam["id"],
            "match_id" => $matchData["id"],
            "type" => "local"
        ]);

        $foundVisitorTeam = TeamMatches::firstOrNew([
            "team_id" => $visitorTeam["id"],
            "match_id" => $matchData["id"],
            "type" => "visitor"
        ]);

        // Set local team match property
        $foundLocalTeam->team_id = $localTeam["id"];
        $foundLocalTeam->match_id = $matchData["id"];
        $foundLocalTeam->type = "local";
        $foundLocalTeam->score = $localTeam["score"] ?: 0;
        $foundLocalTeam->ft_score = $localTeam["ft_score"] ?: 0;
        $foundLocalTeam->et_score = $localTeam["et_score"] ?: 0;
        $foundLocalTeam->pen_score = $localTeam["pen_score"] ?: 0;

        // Set visitor team match property
        $foundVisitorTeam->team_id = $visitorTeam["id"];
        $foundVisitorTeam->match_id = $matchData["id"];
        $foundVisitorTeam->type = "visitor";
        $foundVisitorTeam->score = $visitorTeam["score"] ?: 0;
        $foundVisitorTeam->ft_score = $visitorTeam["ft_score"] ?: 0;
        $foundVisitorTeam->et_score = $visitorTeam["et_score"] ?: 0;
        $foundVisitorTeam->pen_score = $visitorTeam["pen_score"] ?: 0;

        $foundLocalTeam->save();
        $foundVisitorTeam->save();
    }
}
