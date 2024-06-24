<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import user form sql file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Importing user...');

        try {
            $sql = file_get_contents(database_path('sql/user.sql'));
            DB::unprepared($sql);
            $this->info('User imported successfully.');
        } catch (\Exception $e) {
            $this->error('Failed to import user.');
            $this->error($e->getMessage());
        }
    }
}
