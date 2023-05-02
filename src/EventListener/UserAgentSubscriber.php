<?php

namespace App\EventListener;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class UserAgentSubscriber implements EventSubscriberInterface
{
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();
        $userAgent = $request->headers->get('User-Agent');
        $this->logger->info(sprintf('El User-Agent es "%s', $userAgent));


    }
    public static function getSubscribedEvents(): array
    {
        return [
            RequestEvent::class => 'onKernelRequest'
        ];
    }


}