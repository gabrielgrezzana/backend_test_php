<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetVotes extends Command
{    
    protected $signature = 'votes:reset';
    protected $description = 'Reset votes in table votations';

 
    public function  __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        DB::table('votation')->truncate();

        $this->info('A tabela de votação foi resetada.');
    }
}
