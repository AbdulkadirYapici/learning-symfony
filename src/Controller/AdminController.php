<?php

namespace App\Controller;
use App\Service\NameGenerator;
use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminController extends AbstractController {
  /**
  *@Route("/admin", name="admin")
  */
  public function admin( ){

    return new Response ("Admin Sayfası" );

  }
    /**
     *@Route("/admin/hello")
     */
    public function hello( ){

        return new Response ("Admin Sayfası Hello Route" );

    }

}
