<?php

namespace App\Domain\Test;

use App\Domain\Entity\Message;
use App\Domain\Gateway\MessageGateway;
use App\Domain\Presenter\ChatPresenterInterface;
use App\Domain\Response\ChatResponse;
use App\Domain\UseCase\Chat;
use PHPUnit\Framework\TestCase;

// Exemple de test unitaire
class ChatTest extends TestCase
{
    // Bouchonner le Gateway
    private MessageGateway $messageGateway;

    private ChatPresenterInterface $chatPresenter;

    protected function setUp()
    {
        $this->messageGateway = new class() implements MessageGateway {

            public function add(Message $message): void
            {

            }

            public function findAll(): array
            {
                return array_fill(1, 10, new Message("Message"));
            }
        };

        $this->chatPresenter = new class() implements ChatPresenterInterface {

            public array $messages;

            public function present(ChatResponse $chatResponse)
            {
                $this->messages = array_map(
                    fn(Message $message) => $message->getContent(),
                    $chatResponse->getMessages()
                );
            }
        };
    }

    public function test()
    {
        $chat = new Chat($this->messageGateway);

        $chat->execute($this->chatPresenter);

        $this->assertCount(10, $this->chatPresenter->messages);

    }
}