# Symfony5 RabbitMQ Image cropping app
### This application built on top of the rabbitMQ and symfony5.2, intended to crop images sent to rabbitMQ server by rest API.

##Usage
1) Start symfony server
```shell
symfony server:start
```
2) Start RabbitMQ consumer to consume queued messages
```shell
php bin/console rabbitmq:consumer messaging
```
3) Call rest API to publish a message(image data) to the queue. Example request:
```http request
http://127.0.0.1:8001/crop-image/?url=https://upload.wikimedia.org/wikipedia/commons/f/ff/Pizigani_1367_Chart_10MB.jpg
```

#### After sending messages to the queue, cropped images will be stored in the `public/images` directory