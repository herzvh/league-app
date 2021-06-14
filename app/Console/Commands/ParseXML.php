<?php

namespace App\Console\Commands;

use App\Services\TournamentService;
use App\Services\XMLReaderService;
use Illuminate\Console\Command;

class ParseXML extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:xml save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse xml into json and insert them into database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(XMLReaderService $XMLReaderService, TournamentService $tournamentService)
    {
        $data = $XMLReaderService->readToArray('https://ufc.kickit.co.za/ethiopia');
        $tournamentService->saveOrUpdate($data);
    }
}
