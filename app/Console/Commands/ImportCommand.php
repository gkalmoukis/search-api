<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\{
    LocationImport,
    TypeImport,
    ListingImport
};

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        (new LocationImport)->withOutput($this->output)->import(storage_path()."/app/data/"."listings.xlsx");
        (new TypeImport)->withOutput($this->output)->import(storage_path()."/app/data/"."listings.xlsx");
        (new ListingImport)->withOutput($this->output)->import(storage_path()."/app/data/"."listings.xlsx");
        
        return Command::SUCCESS;
    }
}
