<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StandardController extends AbstractController
{
    // Ruta dentro de la pagina Web
    /**
     * @Route("/", name="index")
     */
    public function index(){
    // La funcion render ubica el puntero en la carpeta "templates"

        return $this->render('standard/index.html.twig', [

            // Variables que envia el controlador
            'controller_name' => 'StandardController',
        ]);
    }

    /**
     * @Route("/otraPagina/{parametro}/", name="otraPagina")
     */
    public function otraPagina($parametro){

        $num1 = 1;
        $num2 = 10;
        $suma = $num1 + $num2;
        $nombres = "Pepe, Juan, Antonio, Fernando, Alicia, Angela, Kiko";

        return $this->render('standard/otraPagina.html.twig', array(
            'datos' => $parametro,
            'num1'  => $num1,
            'num2'  => $num2,
            "suma"  => $suma,
            "nombres" => $nombres,

        ));
    }
}
