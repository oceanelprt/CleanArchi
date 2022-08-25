<?php

namespace App\Domain\Presenter;

use App\Domain\Response\ChatResponse;

interface ChatPresenterInterface
{
    // Présente une ChatResponse
    public function present(ChatResponse $chatResponse);
}