<?php

namespace DragonCode\Verbose\Services;

use Composer\IO\IOInterface;
use DragonCode\Support\Facades\Helpers\Arr;
use DragonCode\Support\Facades\Instances\Instance;
use DragonCode\Verbose\IncorrectOutputInterfaceException;
use Symfony\Component\Console\Output\OutputInterface;

class Logger
{
    protected static OutputInterface|IOInterface $io;

    protected int $backtrace_level = 5;

    public static function io(IOInterface|OutputInterface $io): void
    {
        if (! Instance::of($io, [IOInterface::class, OutputInterface::class])) {
            throw new IncorrectOutputInterfaceException($io);
        }

        self::$io = $io;
    }

    public function write(array|string $messages): void
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

    protected function message(array|string $messages, string $caller): array|string
    {
        if (is_array($messages)) {
            $messages[] = $caller;

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
