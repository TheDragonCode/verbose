<?php

namespace DragonCode\Verbose\Facades;

use DragonCode\Support\Facades\Facade;
use DragonCode\Verbose\Services\Logger;

/**
 * @method static void write(string|array $messages)
 */
class Log extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Logger::class;
    }
}
