<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
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

        $user = new User("Hugo", "Selatrop", 13, "wakfu@outlook.es");

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
}
