<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;


class CeviriController extends AbstractController
{
    /**
     * @Route("/ceviri", name="ceviri")
     */
    public function hello(TranslatorInterface $translator)
    {
        $message= $translator->trans('hello.user');
        return new Response ($message);
    }
}