<?php

namespace Helldar\Verbose\Facades;

use Helldar\Support\Facades\Facade;
use Helldar\Verbose\Services\Logger;

/**
 * @method static void write(string|array $messages)
 */
final class Log extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Logger::class;
    }
}
