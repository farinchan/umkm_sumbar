<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\UsersImport;


class ImportUserExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:user-excel {--city= : Import user by city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import user from excel file';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $city = $this->option('city');

        if ($city == 'payakumbuh') {
            $this->info('Importing user from excel file...');
            $path = storage_path('app/public/import-user/payakumbuh.xlsx');
            (new UsersImport)->withOutput($this->output)->import($path);
            $this->info('User imported successfully.');
        }elseif ($city == 'sijunjung') {
            $this->info('Importing user from excel file...');
            $path = storage_path('app/public/import-user/sijunjung.xlsx');
            (new UsersImport)->withOutput($this->output)->import($path);
            $this->info('User imported successfully.');
        }
        else{
            $this->info('sorry, city not found');
        }


        // $this->info('Importing user from excel file...');
        // $path = storage_path('app/public/users.xlsx');
        // (new UsersImport)->withOutput($this->output)->import($path);
        // $this->info('User imported successfully.');
    }
}
