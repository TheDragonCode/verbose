<?php

namespace Helldar\Verbose\Services;

use Composer\IO\IOInterface;
use Helldar\Support\Facades\Helpers\Arr;
use Helldar\Support\Facades\Helpers\Instance;
use Helldar\Verbose\IncorrectOutputInterfaceException;
use Symfony\Component\Console\Output\OutputInterface;

final class Logger
{
    /** @var \Composer\IO\IOInterface|\Symfony\Component\Console\Output\OutputInterface */
    protected static $io;

    protected $backtrace_level = 5;

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
        if (! $this->allow()) {
            return;
        }

        $trace = $this->backtrace();

        $caller = $this->caller($trace);

        self::$io->writeln(
            $this->message($messages, $caller)
        );
    }

    protected function allow(): bool
    {
        return self::$io && self::$io->isDebug();
    }

    protected function message($messages, string $caller)
    {
        if (is_array($messages)) {
            array_push($messages, $caller);

            return $messages;
        }

        return $caller . ' ' . $messages;
    }

    protected function caller(array $backtrace): string
    {
        $file = Arr::get($backtrace, 'class');
        $line = Arr::get($backtrace, 'function');

        return '<info>[' . $file . '::' . $line . '()]</info>';
    }

    protected function backtrace(): array
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, $this->backtrace_level);

        return array_pop($trace);
    }
}
