<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension{
    public function getFilters()
    {
      return [
        new TwigFilter( 'md5', [$this, 'md5Filter']),
        new TwigFilter( 'deneme', [$this, 'denemeFunc']),

      ];
    }
    public function md5Filter($string){
      return md5($string);
    }
    public function denemeFunc($string){
      return 'aaa'. $string;
    }
}
