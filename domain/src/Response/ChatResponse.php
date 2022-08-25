<?php

namespace App\Domain\Response;

// DTO qui va contenir les données
class ChatResponse
{
    /**
     * @var array
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
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }


}