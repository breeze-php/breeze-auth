<?php

namespace Authentication;

use Breeze\Core\Module\StandardAutoloaderTrait;

/**
 * Class Module
 */
class Module
{
    use StandardAutoloaderTrait;

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
