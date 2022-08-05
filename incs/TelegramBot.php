<?php


class TelegramBot extends \Telegram\Bot\Api
{

    public function someRequest(string $method, array $params = []): \Telegram\Bot\Objects\Message
    {
        $response = $this->post($method, $params);
        return new \Telegram\Bot\Objects\Message($response->getDecodedBody());
    }

}