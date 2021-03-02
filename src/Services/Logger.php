<?php

namespace Helldar\Verbose\Services;

use Composer\IO\IOInterface;

final class Logger
{
    /** @var \Composer\IO\IOInterface */
    protected $io;

    public function io(IOInterface $io): self
    {
        $this->io = $io;

        return $this;
    }

    public function write($messages): void
    {
        if ($this->allow()) {
            $this->io->writeError($messages);
        }
    }

    protected function allow(): bool
    {
        return $this->io && $this->io->isDebug();
    }
}
