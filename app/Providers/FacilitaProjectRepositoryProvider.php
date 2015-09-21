<?php

namespace FacilitaProject\Providers;

use Illuminate\Support\ServiceProvider;

class FacilitaProjectRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \FacilitaProject\Repositories\ClientRepository::class,
            \FacilitaProject\Repositories\ClientRepositoryEloquent::class
        );
        $this->app->bind(
            \FacilitaProject\Repositories\ProjectRepository::class,
            \FacilitaProject\Repositories\ProjectRepositoryEloquent::class
        );
        $this->app->bind(
            \FacilitaProject\Repositories\ProjectNoteRepository::class,
            \FacilitaProject\Repositories\ProjectNoteRepositoryEloquent::class
        );
    }
}
