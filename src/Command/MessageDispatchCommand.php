<?php

declare(strict_types=1);

namespace App\Command;

use App\Message\TestMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class MessageDispatchCommand extends Command
{
    protected static $defaultName = 'app:message:dispatch';
    protected static $defaultDescription = 'Dispatch a test message';

    /**
     * @var MessageBusInterface
     */
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->bus->dispatch(new TestMessage());
        $output->writeln('Message dispatched!');
        return 0;
    }
}
