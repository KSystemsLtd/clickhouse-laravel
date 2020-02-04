<?php

namespace KSystems\ClickHouse\Facades;

use Illuminate\Support\Facades\Facade as LaravelFacade;
use ClickHouseDB;

class ClickHouse extends LaravelFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ClickHouseDB::class;
    }
}
