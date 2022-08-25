<?php

namespace App\Domain\UseCase;

use App\Domain\Presenter\ChatPresenterInterface;
use App\Domain\Request\ChatRequest;
use App\Domain\Response\ChatResponse;

class Chat
{
    // Quand j'exécute, je récupère une requête si besoin
    public function execute(ChatRequest $request, ChatPresenterInterface $chatPresenter): void
    {
        // Le UseCase présente en envoyant une Response.
        $chatPresenter->present(new ChatResponse([
            "message 1",
            "message 2"
        ]));
    }
}