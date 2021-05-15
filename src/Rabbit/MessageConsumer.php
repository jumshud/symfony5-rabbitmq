<?php

namespace App\Rabbit;

use App\Service\CropImageService;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class MessageConsumer implements ConsumerInterface
{

    public function execute(AMQPMessage $msg)
    {
        $message = json_decode($msg->body, true);

        echo 'Received an image url: '.$message['image'] . PHP_EOL;

        $cropService = new CropImageService();
        $cropService->crop($message['image'], $message['size']);
    }
}
