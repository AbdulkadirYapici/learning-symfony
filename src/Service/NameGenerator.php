<?php

namespace App\Service;

class NameGenerator{

  private $adminEmail;

  public function __construct ($adminEmail){
    $this->adminEmail = $adminEmail;
  }

  public function adminMessage(){
    $message = 'Hello ! -> admin mail : '. $this->adminEmail;
      return $message ;
  }

    public function randomName(){
      $names = ['Kadir','Ali','Veli','Hasan','Hüseyin'];
      $index = array_rand($names);

      return $names[$index] ;


    }

}
