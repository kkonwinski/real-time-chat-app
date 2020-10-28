<?php


namespace App\Websocket;


use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class MessageHandler implements MessageComponentInterface
{
    protected $connections;

    public function __construct()
    {
        $this->connections = new \SplObjectStorage();
    }

    /**
     * @inheritDoc
     */
    public function onOpen(ConnectionInterface $conn)
    {
        $this->connections->attach($conn);
    }

    /**
     * @inheritDoc
     */
    public function onClose(ConnectionInterface $conn)
    {
        $this->connections->detach($conn);

    }

    /**
     * @inheritDoc
     */
    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        $this->connections->detach($conn);
        $conn->close();
    }

    /**
     * @inheritDoc
     */
    public function onMessage(ConnectionInterface $from, $msg)
    {
        foreach ($this->connections as $connection) {
            if ($connection == $from) {
                continue;
            }

            $connection->send($msg);
        }
    }
}