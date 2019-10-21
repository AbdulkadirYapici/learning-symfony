<?php

namespace App\Controller;
use App\Service\NameGenerator;
use App\Service\MessageGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class BlogController extends Controller{
    /**
     *@Route("/raw-sql")
     */
    public function RawSQL( ){

        return new Response ();

    }
}
