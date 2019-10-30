<?php

namespace App\Controller;

use App\SiparisEvents;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;


class SiparisController extends AbstractController
{
    /**
     * @Route("/siparis-ver", name="siparis-ver")
     */
    public function siparis(EventDispatcherInterface $dispatcher, Request $request)
    {
        $urun = $request->get('urun');
        if(empty($urun)){
            throw new NotFoundHttpException('Urun bulunamadi');
        }
        $dispatcher->dispatch(SiparisEvents::KAYDEDILDI,new SiparisEvents($urun) );
        return new Response(sprintf('<html><body>Urun siparisiniz kaydedildi. Urun %s </body></html>' , $urun)) ;
    }
}