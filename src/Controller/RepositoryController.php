<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RepositoryController extends Controller {
    /**
     *@Route("/repofindterm", name= "term_search")
     */
    public function repo(){
        $entityManager= $this->getDoctrine()->getManager();
        /** @var BlogRepository $blogrepo */
        $blogrepo= $entityManager->getRepository(Blog::class);
        $blogs = $blogrepo->findByEntryContains('aaa');
        return $this->render('Blog/index.html.twig', [
            'blog' => $blogs ,
        ]);
    }
}
