<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;


class RoutingController extends AbstractController
{

    /**
     * @Route({
     *  "en": "/about",
     *  "tr": "/hakkinda"
     *}, name ="about")
     */
    public function index()
    {
        return new JsonResponse ([ 'message' => 'Hakkinda Sayfasi']);
    }



    /**
     * @Route("/blog/{page}", name ="blog_listeler", requirements ={"page"="\d+"})
     */

    // *@Route("/blog/{page<\d+>}", name ="blog_listeler", requirements ={"page"="\d+"})

    public function listele($page)
    {
        return new Response ("Sayfa: ". $page);
    }


    /**
     * @Route("/blog/{postSlug}", name ="blog_listeler_2")
     */
    public function listeleWithSlug($postSlug)
    {
        return new Response ("Post Slug: ". $postSlug);
    }

    /**
     * @Route("/routing/hello/{_locale}", name ="hello_routing", defaults= {"_locale" = "tr"}, requirements= {"_locale"= "en|tr"})
     */
    public function helloRouting($_locale)
    {
        return new Response ("Locale is: ". $_locale);
    }

    /**
     * @Route("/makaleler/{_locale}/{yil}/{slug}.{_format}",
     *defaults ={"_format" : "html"}  ,
     *requirements = {"_locale": "en|tr", "_format" : "html|json", "yil": "\d+"}
     *
     *)
     */
    public function showArticle($_locale, $yil, $slug, $_format)
    {
      if($yil>1900){
        return new JsonResponse (['message' => implode ("--", [$_locale, $yil, $slug, $_format])]);

      }
      else{
        return new JsonResponse (['message' => implode ("--", [$_locale, $yil, $slug, $_format, "yil kücük"])]);

      }
    }

    /**
     * @Route("/api/posts/{id}", methods={"POST", "GET"})
     */
    public function showPost($id)
    {
        return new Response ("Id is: ". $id);
    }


    /**
     * @Route("/generate-url")
     */
    public function urlGenerator()
    {
        return new Response ("Router konusu" );
    }

    /**
     * @Route("/request", name = "request_test")
     */
    public function requestTest(RequestStack $requestStack)
    {
        $request = $requestStack->getCurrentRequest();

        //$_POST
        $name = $request->request->get('name');
        //$_GET
        $request->query->get('name');
        //$request->query->get('name','kadir');
        $name = $request->query->get('name','kadir');
        var_dump($name); exit;

        //$_COOKIE
        $request->cookies->get('name');
        // ---
        $request->attributes->get('name');
        //$_FILES
        $request->files->get('filename');
        //$_SERVER
        $serverData = $request->server->all();
        //$serverData = $request->server->get('REMOTE_ADDR');
        $headers= $request->headers->all();

        var_dump($serverData); exit;
    }




  }
