<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class ServiciosController extends AbstractController
{
    /**
     * @Route("/servicios", name="servicios")
     */
    public function index(SessionInterface $session
    )
    {
        $username = $session->get('usuario');
        $userlog = strlen($username)>0?"Hola ".$username:"";
        return $this->render('servicios.html.twig', [
            'Usuario' => $userlog
        ]);
    }
}
