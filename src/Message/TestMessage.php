<?php

declare(strict_types=1);

namespace App\Message;

final class TestMessage
{
    /**
     * @var int
     * Timestamp since epoch
     */
    private $timestamp;

    public function __construct()
    {
        $this->timestamp = time();
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }
}
