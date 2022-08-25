<?php

namespace App\UserInterface\Controller;

use App\Domain\Presenter\ChatPresenterInterface;
use App\Domain\Request\ChatRequest;
use App\Domain\UseCase\Chat;
use App\UserInterface\Presenter\ChatPresenter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ChatController
{
    public function __invoke(Chat $chat, SerializerInterface $serializer): Response
    {
        $request = new ChatRequest();

        $chatPresenter = new ChatPresenter();

        $chat->execute($request, $chatPresenter);

        // "Je présente"
        // On récupère le ViewModel instancié grâce au Presenter.
        return new JsonResponse($serializer->serialize($chatPresenter->getChatViewModel(), 'json'), 200, [], true);
    }
}