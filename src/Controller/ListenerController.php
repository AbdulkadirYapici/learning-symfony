<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ListenerController extends AbstractController
{
    /**
     * @Route("/listener", name="listener")
     * @return Response
     */
    public function listener()
    {
        return new Response("Listener Event ");
    }
}
