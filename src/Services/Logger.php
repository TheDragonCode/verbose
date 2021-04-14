<?php

namespace Helldar\Verbose\Services;

use Composer\IO\IOInterface;
use Helldar\Support\Facades\Helpers\Instance;
use Helldar\Verbose\IncorrectOutputInterfaceException;
use Symfony\Component\Console\Output\OutputInterface;

final class Logger
{
    /** @var \Composer\IO\IOInterface|\Symfony\Component\Console\Output\OutputInterface */
    protected static $io;

    /**
     * @param  \Composer\IO\IOInterface|\Symfony\Component\Console\Output\OutputInterface  $io
     */
    public static function io($io): void
    {
        if (! Instance::of($io, [IOInterface::class, OutputInterface::class])) {
            throw new IncorrectOutputInterfaceException($io);
        }

        self::$io = $io;
    }

    public function write($messages): void
    {
        if ($this->allow()) {
            self::$io->write($messages);
        }
    }

    protected function allow(): bool
    {
        return self::$io && self::$io->isDebug();
    }
}
