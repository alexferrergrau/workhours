<?php
namespace AppBundle\EventListener;

use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Bridge\Monolog\Logger;

class LogListener
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }


    public function onKernelRequest (GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getRequestUri();
        $this->logger->info($baseurl);


    }
}