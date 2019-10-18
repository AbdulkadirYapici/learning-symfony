<?php

namespace App\Service;
use Symfony\Component\HttpFoundation\RequestStack;

class MessageGenerator
{

/**

*/
private $nameGenerator;
private $requestStack;
private $adminEmail;

public function __construct (NameGenerator $nameGenerator, RequestStack $requestStack, $adminEmail){
  $this->nameGenerator = $nameGenerator ;
  $this->requestStack = $requestStack;
  $this->adminEmail = $adminEmail;
}

public function helloMessage(){
  $name = $this->requestStack->getCurrentRequest()->get('name');
  if(empty($name)){
    $name = $this->nameGenerator->randomName();
  }
  $message = 'Hello ' . $name.  '! -> admin mail : '. $this->adminEmail;
    return $message ;
}

}