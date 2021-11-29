<?php

namespace App\Providers;

use App\Repositories\Color\ColorRepository;
use App\Repositories\Color\ColorRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRepositories([
            UserRepositoryInterface::class => UserRepository::class,
            ColorRepositoryInterface::class => ColorRepository::class,
        ]);
    }

    /**
     * Register Eloquent repositories
     *
     * $repositoriesConfig
     * [
     *   "RepositoryInterfaceClass" => "RepositoryClass"
     * ]
     *
     * @param array $repositoriesConfig
     */
    private function registerRepositories($repositoriesConfig)
    {
        foreach ($repositoriesConfig as $interfaceClass => $repositoryClass) {
            $this->app->bind($interfaceClass, $repositoryClass);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
