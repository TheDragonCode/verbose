<?php

namespace Helldar\Verbose\Facades;

use Composer\IO\IOInterface;
use Helldar\Support\Facades\BaseFacade;
use Helldar\Verbose\Services\Logger;

/**
 * @method static Logger io(IOInterface $io)
 * @method static void write(string|array $messages)
 */
final class Log extends BaseFacade
{
    protected static function getFacadeAccessor()
    {
        return Logger::class;
    }
}
