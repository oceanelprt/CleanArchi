<?php

namespace App\Domain\UseCase;

use App\Domain\Gateway\MessageGateway;
use App\Domain\Presenter\ChatPresenterInterface;
use App\Domain\Request\ChatRequest;
use App\Domain\Response\ChatResponse;

// Lister les messages
class Chat
{
    private MessageGateway $messageGateway;

    /**
     * @param MessageGateway $messageGateway
     */
    public function __construct(MessageGateway $messageGateway)
    {
        $this->messageGateway = $messageGateway;
    }

    // Quand j'exécute, je récupère une requête si besoin
    public function execute(ChatRequest $request, ChatPresenterInterface $chatPresenter): void
    {
        // Le UseCase présente en envoyant une Response.
        $chatPresenter->present(new ChatResponse($this->messageGateway->findAll()));
    }
}