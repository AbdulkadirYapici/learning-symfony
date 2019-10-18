<?php

namespace App\KadirLtd\TestBundle\Controller;
use App\Service\NameGenerator;
use App\Service\MessageGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class BundleTestController extends Controller{
  /**
  *@Route("/bundle-test/hello")
  */
  public function hello(){
    return $this-> render ('@KadirLtd\Hello\index.html.twig');

  }

}
