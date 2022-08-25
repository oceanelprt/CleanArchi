<?php

namespace App\Domain\Response;

// DTO qui va contenir les données
use App\Domain\Entity\Message;

class ChatResponse
{
    /**
     * @var Message[]
     */
    private $messages = [];

    /**
     * @param array $messages
     */
    public function __construct(array $messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return Message[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }


}