<?php

namespace Breeze\Auth\OnRequest                                                                                        ;

use Breeze\Auth\Context\VerifyToken;
use Zend\EventManager\EventManager;
use Zend\Mvc\MvcEvent;

/**
 * Class OnRequest
 */
class Authenticate
{
    /**
     * @var VerifyToken
     */
    private $verifyToken;

    /**
     * Authenticate constructor.
     * @param VerifyToken $verifyToken
     */
    public function __construct(VerifyToken $verifyToken)
    {
        $this->verifyToken = $verifyToken;
    }

    /**
     * @param EventManager $events
     * @return void
     */
    public function attach(EventManager $events)
    {
        $events->attach(MvcEvent::EVENT_DISPATCH, [$this, 'onDispatch']);
    }

    /**
     * @param MvcEvent $event
     * @return void
     */
    public function onDispatch(MvcEvent $event)
    {
        $this->verifyToken->verify();
    }
}
