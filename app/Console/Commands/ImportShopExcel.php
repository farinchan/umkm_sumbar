<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\ShopImport;

class ImportShopExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:shop-excel {--city= : Import user by city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import shop from excel file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
            
            $city = $this->option('city');
    
            if ($city == 'payakumbuh') {
                $this->info('Importing shop from excel file...');
                $path = storage_path('app/public/import-shop/payakumbuh.xlsx');
                (new ShopImport)->withOutput($this->output)->import($path);
                $this->info('Shop imported successfully.');
            }elseif ($city == 'sijunjung') {
                $this->info('Importing shop from excel file...');
                $path = storage_path('app/public/import-shop/sijunjung.xlsx');
                (new ShopImport)->withOutput($this->output)->import($path);
                $this->info('Shop imported successfully.');
            }
            else{
                $this->info('sorry, city not found');
            }
    }
}
