<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;


class TemplateExtensionController extends AbstractController
{

    /**
     * @Route("/template-extension", name ="template-extension")
     */
    public function index()
    {
        return $this->render("template-extension/index.html.twig",
        [
          'sentence' => 'Hi im kadir'
        ]


      );
    }





  }
