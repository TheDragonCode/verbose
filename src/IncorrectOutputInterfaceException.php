<?php

namespace Helldar\Verbose;

use Composer\IO\IOInterface;
use InvalidArgumentException;
use Symfony\Component\Console\Output\OutputInterface;

final class IncorrectOutputInterfaceException extends InvalidArgumentException
{
    public function __construct($class)
    {
        $message = $this->message($class);

        parent::__construct($message);
    }

    protected function message($class): string
    {
        return sprintf('Argument 1 must be instance of %s or %s, %s given', IOInterface::class, OutputInterface::class, get_class($class));
    }
}
