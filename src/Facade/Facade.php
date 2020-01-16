<?php
namespace LaravelChetanTwilio\LaravelTwilio\Facade;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Facade extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'twilio';
    }
}
