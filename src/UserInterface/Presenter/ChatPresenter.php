<?php

namespace App\UserInterface\Presenter;

use App\Domain\Entity\Message;
use App\Domain\Presenter\ChatPresenterInterface;
use App\Domain\Response\ChatResponse;
use App\UserInterface\ViewModel\ChatViewModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

// Implémentation côté interface
// Utilisé dans le controller
// Un alias est créé car 1 seule classe implémente ChatPresenterInterface.
// Donc, lorsqu'on appelle ChatPresenterInterface, on obtient ChatPresenter.
class ChatPresenter implements ChatPresenterInterface
{
    private ChatViewModel $chatViewModel;

    public function present(ChatResponse $chatResponse)
    {
        $this->chatViewModel = new ChatViewModel(
            array_map(fn(Message $message) => $message->getContent(), $chatResponse->getMessages())
        );
    }

    /**
     * @return ChatViewModel
     */
    public function getChatViewModel(): ChatViewModel
    {
        return $this->chatViewModel;
    }
}