<?php

namespace App\Controller;
use App\Service\NameGenerator;
use App\Service\MessageGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HelloController extends Controller{
  /**
  *@Route("/hello")
  */
  public function hello(MessageGenerator $messageGenerator){
    return new Response ($messageGenerator->helloMessage ());

  }
  /**
  *@Route("/publictrue")
  */
  public function publictrue(){
    $messageGenerator= $this->container -> get('mg');
    $session = $this->container -> get('session');
    return new Response ($messageGenerator->helloMessage (). '----'. $session-> getName());
  }
  /**
  *@Route("/admin")
  */
  public function admin(nameGenerator $messageGenerator){
    return new Response ($messageGenerator->adminMessage ());

  }
  
  /*
  public function hello(NameGenerator $nameGenerator){
    $name = $nameGenerator -> randomName();
    $message = 'Hello ' . $name ;
    return new Response ($message) ;

  }*/
}
