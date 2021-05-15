<?php

namespace App\Service;

use App\Rabbit\MessagingProducer;

class MessageService
{
    private MessagingProducer $messagingProducer;

    public function __construct(MessagingProducer $messagingProducer)
    {
        $this->messagingProducer = $messagingProducer;
    }

    public function createMessage(string $imageUrl): bool
    {
        $message = json_encode([
            'size' => '400x400',
            'image' => $imageUrl,
        ]);

        $this->messagingProducer->publish($message);

        return true;
    }
}
