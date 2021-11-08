<?php

namespace gipfl\Log\Writer;

use gipfl\Log\LogLevel;
use gipfl\Log\LogWriterWithContext;
use gipfl\SystemD\NotificationSocket;
use React\EventLoop\LoopInterface;
use React\Stream\WritableStreamInterface;

class JournaldLogger implements LogWriterWithContext
{
    const JOURNALD_SOCKET = '/run/systemd/journal/socket';

    protected $socket;

    protected $extraFields = [];

    /**
     * SystemdStdoutWriter constructor.
     * @param LoopInterface $loop
     * @param WritableStreamInterface|null $stdOut
     */
    public function __construct($socket = null)
    {
        $this->socket = new NotificationSocket($socket ?: self::JOURNALD_SOCKET);
    }

    /**
     * @param string|null $identifier
     */
    public function setIdentifier($identifier)
    {
        if ($identifier === null) {
            unset($this->extraFields['SYSLOG_IDENTIFIER']);
        } else {
            $this->extraFields['SYSLOG_IDENTIFIER'] = (string) $identifier;
        }
    }

    public function write($level, $message, $context = [])
    {
        $this->socket->send([
            'MESSAGE' => $message,
            'PRIORITY' => LogLevel::mapNameToNumeric($level),
        ] + $context + $this->extraFields);
    }
}
