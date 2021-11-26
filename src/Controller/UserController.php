<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/user/success/", name="success")
     */
    public function ingresarDatos(){

        $entityManager = $this->getDoctrine()->getManager();

        $category = new Category("administrador");
        $user = new User("Angel", "Bixde", 22, "asantos@invented.es");
        $user->setCategory($category);

        # $user = new User();
        # $user->setName("Francisco");
        # $user->setLastname("Botella Botijo");
        # $user->setAge(22);
        # $user->setEmail("inventado@esto-sigue.com");

        ## REVISAR ##
        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('Saved new product with id '.$user->getId());
    }

    /**
     * @Route("/user/find/", name="find")
     */
    public function buscarUser(){

        # Busquedas en la base de datos
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository(User::class)->find(1);
        $userOneBy = $em->getRepository(User::class)->findOneBy(['name'=>"Hugo", "lastname"=>"Selatrop"]);
        $userBy = $em->getRepository(User::class)->findBy(["lastname"=>"Bixde"]);
        $userAll = $em->getRepository(User::class)->findAll();


        return $this->render('user/busqueda.html.twig', [
            "find" => $user,
            "findOneBy" => $userOneBy,
            "findBy" => $userBy,
            "findAll" => $userAll,
        ]);
    }
}
