<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup database by running migrations and seeders';

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
    public function handle()
    {
        // Ejecutar migraciones
        //$this->info('Running migrations...');
        echo "Running migrations..." . PHP_EOL;
        Artisan::call('migrate');

        // Ejecutar seeders
        //$this->info('Running seeders...');
        echo "Running seeders..." . PHP_EOL;
        Artisan::call('db:seed');

        // Mensaje de finalización
        //$this->info('Setup completed.');
        echo "Setup completed." . PHP_EOL;
    }
}
