<?php

namespace Modules\Sms\Core\Contracts;

interface WHATSAPP
{
    /**
     * Send the given message to the given recipient.
     *
     * @return mixed
     */
    public function send();
}
