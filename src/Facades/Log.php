<?php

namespace Helldar\Verbose\Facades;

use Helldar\Support\Facades\BaseFacade;
use Helldar\Verbose\Services\Logger;

/**
 * @method static void write(string|array $messages)
 */
final class Log extends BaseFacade
{
    protected static function getFacadeAccessor()
    {
        return Logger::class;
    }
}
