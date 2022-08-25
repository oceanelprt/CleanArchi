<?php

namespace App\Infrastructure\Ports\Secondary;

// Dossier src/Infrastructure/Ports/Secondary : ports utilisés pour le développement et non en production
use App\Domain\Entity\Message;
use App\Domain\Gateway\MessageGateway;

class MessageRepository implements MessageGateway
{

    public function add(Message $message): void
    {
        // TODO: Implement add() method.
    }

    public function findAll(): array
    {
        return array_fill(1, 10, new Message("Message"));
    }
}