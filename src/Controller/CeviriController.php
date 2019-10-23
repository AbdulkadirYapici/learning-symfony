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
        $messageControllerTrans= $translator->trans('hello.user');

        $messageTwigTrans= 'hello.user';

        $messageName = $translator->trans('Merhaba name', [
           'name'=> "Kadir"
        ]);
        return $this->render('ceviri/index.html.twig', [
            'messageControllerTrans'=>$messageControllerTrans,
                'messageTwigTrans' => $messageTwigTrans,
                'messageName' => $messageName,
            ]
            );
    }
}