<?php

namespace Modules\WhatsApp\Core\Drivers;

use Modules\Sms\Core\Contracts\WHATSAPP;
use Modules\WhatsApp\Core\Exceptions\WhatsAppException;

abstract class Driver implements WHATSAPP
{
    /**
     * The recipient of the message.
     *
     * @var string
     */
    protected $recipient;

    /**
     * The message to send.
     *
     * @var string
     */
    protected $message;

    /**
     * {@inheritdoc}
     */
    abstract public function send();

    /**
     * Set the recipient of the message.
     *
     * @param string $recipient
     *
     * @return $this
     * @throws \Modules\WhatsApp\Core\Exceptions\WhatsAppException
     *
     */
    public function to(string $recipient)
    {
        throw_if(is_null($recipient), WhatsAppException::class, 'Recipients cannot be empty');

        $this->recipient = $recipient;

        return $this;
    }

    public function content(string $message)
    {
        throw_if(empty($message), WhatsAppException::class, 'Message text is required');

        $this->message = $message;

        return $this;
    }
}
