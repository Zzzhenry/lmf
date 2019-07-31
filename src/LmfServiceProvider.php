<?php

namespace Zhenry\Lmf;

use Illuminate\Support\ServiceProvider;
use Zhenry\Lmf\Commands\MakeFileCommand;

class LmfServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeFileCommand::class,
            ]);
        }
    }
}
