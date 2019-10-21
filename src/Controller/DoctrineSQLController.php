<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DoctrineSQLController extends Controller
{
    /**
     * @Route("/rawsql")
     */
    public function RawSQL( )
    {
        $entityManager= $this->getDoctrine()->getManager();
        $sql = "SELECT * FROM blog LIMIT 5";
        $statement =$entityManager->getConnection()->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        var_dump($result); exit ;
        return new Response ();

    }
    /**
     * @Route("/bindsql")
     */
    public function bindSQL (){
        $entityManager= $this->getDoctrine()->getManager();
        $sql = "SELECT * FROM blog where entry LIKE :term LIMIT 5";
        $statement =$entityManager->getConnection()->prepare($sql);
        $statement->bindValue('term', '%a%');
        $statement->execute();
        $result = $statement->fetchAll();
        var_dump($result); exit ;
        return new Response ();

    }
}