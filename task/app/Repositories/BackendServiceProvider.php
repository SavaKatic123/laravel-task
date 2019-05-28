<?php
namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
          'App\Repositories\ProductRepositoryInterface',
          'App\Repositories\ProductRepository'
        );

        $this->app->bind(
          'App\Repositories\MerchantRepositoryInterface',
          'App\Repositories\MerchantRepository'
        );
    }
}