<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;


class TemplateController extends AbstractController
{

    /**
     * @Route("/template", name ="about")
     */
    public function index()
    {
        return $this->render("template/index.html.twig");
    }





  }
