<?php

namespace Knp\IpsumBundle\EventListener;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Knp\IpsumBundle\Twig\Extension\IpsumExtension;

class ControllerListener
{
    protected $extension;

    public function __construct(IpsumExtension $extension)
    {
        $this->extension = $extension;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        if (HttpKernelInterface::MASTER_REQUEST === $event->getRequestType()) {
            $this->extension->setController($event->getController());
        }
    }
}
