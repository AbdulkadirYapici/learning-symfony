<?php

namespace App\EventListener;

//Service.yaml değiştiriliyor.
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
class ResponseListener
{
    public function onKernelResponse (FilterResponseEvent $event){
        $response= $event->getResponse();
        $response->headers->set('Name', 'kadir');

        $content = $response->getContent();
        $response->setContent($content.' Merhaba Kadir1');
    }
}