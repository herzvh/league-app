<?php

namespace App\Api\Controllers;

use App\Repository\TeamRepository;

class TeamController extends BaseController
{

    /**
     * @var TeamRepository
     */
    private $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function index()
    {
        $data = $this->teamRepository->getAllTeams();
        return response()->json($data, 200);
    }
}
