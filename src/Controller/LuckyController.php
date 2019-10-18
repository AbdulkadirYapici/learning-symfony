<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Psr\Log\LoggerInterface;



class LuckyController extends AbstractController{

    /**
     * @Route("/index1", name="index1")
     */
     public function index()
     {
         // redirect to a route with parameters
        return $this->redirectToRoute('app_lucky_number', ['max' => 10]);
     }

     /**
     * @Route("/lucky/number/{max}", name="app_lucky_number")
     */
    public function number($max)
    {
      $number = random_int(0, $max);

        return new Response(

            '<html><body>Lucky number: '.$number.'</body></html> '
        );
    }
}
