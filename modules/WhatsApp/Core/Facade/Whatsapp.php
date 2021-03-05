<?php

namespace Modules\WhatsApp\Core\Facade;

use Illuminate\Support\Facades\Facade;

class Whatsapp extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'whatsapp';
    }
}
