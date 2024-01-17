<?php

namespace App\Console\Commands;

use App\Models\Asal\Config;
use App\Models\Tujuan\Config as TujuanConfig;
use Illuminate\Console\Command;

class PindahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gawean:asu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $setConfigId = '';
        $this->info('pindah table config');
        $config = Config::all();
        foreach ($config as $item) {
            $item->config_id = $setConfigId;
            $a = TujuanConfig::create($item->toArray());
            $setConfigId = $a->id;
        }
    }
}
