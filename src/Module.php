<?php

namespace Breeze\Auth;

/**
 * Class Module
 */
class Module
{
    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '../config/module.config.php';
    }
}
