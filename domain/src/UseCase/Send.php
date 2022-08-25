<?php

namespace App\Domain\UseCase;

// Envoyer un message
use App\Domain\Entity\Message;
use App\Domain\Gateway\MessageGateway;
use App\Domain\Request\SendRequest;

class Send
{
    private MessageGateway $messageGateway;

    /**
     * @param MessageGateway $messageGateway
     */
    public function __construct(MessageGateway $messageGateway)
    {
        $this->messageGateway = $messageGateway;
    }

    public function execute(SendRequest $request): void
    {
        $this->messageGateway->add(new Message($request->getMessage()));
    }
}