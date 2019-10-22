<?php

namespace App\Controller;
use App\Entity\Blog;
use App\Form\Type\BlogType;
use App\Service\NameGenerator;
use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController {

    /**
     *@Route("/blog/show", name= "blog_show")
     */
    public function blogShow(){
        $blogRepository = $this->getDoctrine()-> getRepository(blog::class);
        $blog= $blogRepository->findAll();
        return $this->render('Blog/index.html.twig', [

                'blog'=> $blog,
            ]

        );

    }

    /**
     *@Route("/blog/singleentry/{id}", name= "single_entry_show")
     */
    public function singeleEntryShow(Blog $entry){
        return new Response ('Entry alindi: ' .$entry->getEntry() );
    }



    /**
     * @Route("/blog/add", name="create_entry")
     */
    public function createEntry(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();


        $blog = new Blog();
        $blog->setEntry('cvbbcv');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($blog);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new entry  with id '.$blog->getId() . ' ---- entry text : ' . $blog->getEntry());
    }


    /**
     * @Route("/blog/update/{id}", name="update_entry")
     */
    public function updateEntry($id, Request $request)
    {
        $entrytext= $request->get('entrytext');
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();
        $blogRepository = $entityManager -> getRepository(Blog::class);

        $entry = $blogRepository->find($id) ;
        $entry->setEntry($entrytext);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($entry);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Updated new entry  with id '.$entry->getId());
    }


    /**
     * @Route("/blog/delete/{id}", name="delete_entry")
     */
    public function deleteEntry($id): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();
        $entry = $entityManager->getRepository(Blog::class)->find($id);
        if(!$entry){
            return $this->CreateNotFoundException('Entry bulunamadı.');
        }


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->remove($entry);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response($id. ' idli entry başarıyla silindi ');
    }
    /**
     *@Route("/form" , name="form" )
     */
    public function Form(Request $request){

        $blog = new Blog();
        $blog->setEntry('Write a blog post');


        $form = $this->createForm(BlogType::class, $blog);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $blog = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!

             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($blog);
             $entityManager->flush();

            return $this->redirectToRoute('blog_show' );
        }
        else {
            if($form -> isSubmitted() ){
                $errors= $form->getErrors(true);
                foreach ($errors as $error){
                    echo $error->getMessage() . '<hr><hr>' ;
                }
            }
            return $this->render('Blog/new.html.twig', [
                'form' => $form->createView(),
            ]);
        }

    }
}
