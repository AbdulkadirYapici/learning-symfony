<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;


class TemplateTagsController extends AbstractController
{

    /**
     * @Route("/template-tags", name ="template-tags")
     */
    public function index()
    {
        return $this->render("template-tags/index.html.twig", [
          'sehirler' => [
            'Ankara',
            'İstanbul',
            'İzmir',
            'Eskişehir',
          ],
          'ifVar' => false,
          'sentence' => 'hi im kadir',
          'bugun' => new \DateTime() 
        ]
      );
    }
  }
