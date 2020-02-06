<?php

namespace KSystems\ClickHouse\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use ClickHouseDB;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/ClickHouse.php' => config_path('clickhouse.php')
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ClickHouseDB::class, function($app) {
            $config = [
                'host' => config('clickhouse.host'),
                'port' => config('clickhouse.port'),
                'username' => config('clickhouse.username'),
                'password' => config('clickhouse.password')
            ];
            $db = new ClickHouseDB\Client($config);
            return $db->database(config('clickhouse.dbname'));            
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            ClickHouseDB::class,
        ];
    }
}
