<?php

namespace Helldar\Verbose\Services;

use Composer\IO\IOInterface;

final class Logger
{
    /** @var \Composer\IO\IOInterface */
    protected static $io;

    public static function io(IOInterface $io): void
    {
        self::$io = $io;
    }

    public function write($messages): void
    {
        if ($this->allow()) {
            self::$io->writeError($messages);
        }
    }

    protected function allow(): bool
    {
        return self::$io && self::$io->isDebug();
    }
}
