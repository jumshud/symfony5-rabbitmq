<?php

namespace App\Controller;

use App\Service\MessageService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ImageController
{
    private MessageService $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * @Route("/crop-image/", name="crop_image", methods={"GET"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createMessages(Request $request): JsonResponse
    {
        $this->messageService->createMessage($request->query->get('url'));

        return new JsonResponse(['status' => 'Sent!']);
    }
}
