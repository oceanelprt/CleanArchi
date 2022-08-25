<?php

namespace App\Domain\Gateway;

// Permet l'accès aux données
use App\Domain\Entity\Message;

interface MessageGateway
{
    public function add(Message $message): void;

    /**
     * @return Message[]
     */
    public function findAll(): array;
}