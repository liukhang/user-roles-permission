<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupProduction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:production {--force : Overwrite database they already exist}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setting up production mode';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $appName = config('app.name');
        $this->changeToUsePhpRedis();

        if (!file_exists(public_path('storage'))) {
            $this->call('storage:link');
        }

        $this->call('optimize:clear');

        if ($this->option('force')) {
            $this->call('migrate:fresh', ['--force' => true]);
            $this->call('db:seed', ['--force' => true]);
        } else {
            $this->call('migrate', ['--force' => true]);
        }

        $this->call('config:cache');
        $this->call('routes:cache');
        $this->call('view:cache');
    }

    /**
     * @return void
     */
    protected function changeToUsePhpRedis()
    {
        if (!extension_loaded('redis')) {
            $this->error('Require enable Redis extension');
            return;
        }

        $this->replaceInFile("'client' => 'predis',", "'client' => 'phpredis',", config_path('database.php'));
        $this->replaceInFile("'Redis'", "'LRedis'", config_path('app.php'));
    }

    /**
     * @return void
     */
    protected function changeToUsePredis()
    {
        $this->replaceInFile("'client' => 'predis',", "'client' => 'phpredis',", config_path('database.php'));
        $this->replaceInFile("'Redis'", "'LRedis'", config_path('app.php'));

        // run composer require predis/predis
        $this->info('Please run: composer require predis/predis');
    }

    /**
     * @param  string|string[] $search
     * @param  string|string[] $replace
     * @param  string $file
     */
    protected function replaceInFile($search, $replace, $file)
    {
        $content = file_get_contents($file);
        file_put_contents($file, str_replace($search, $replace, $content));
    }
}
