<?php

namespace App\MessageHandler;

use App\Message\TestMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class TestMessageHandler implements MessageHandlerInterface
{
    public function __invoke(TestMessage $message)
    {
        if ((time() - $message->getTimestamp()) > 10) {
            return;
        }
        throw new \RuntimeException('Ooops! As a test we will wait 10 seconds before we successfully handle this message');
    }
}
