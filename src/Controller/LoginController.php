<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(SessionInterface $session
    )
    {
        $username = $session->get('usuario');
        $userlog = strlen($username)>0?"Hola ".$username:"";
        return $this->render('login.html.twig', [
            'Usuario' => $userlog
        ]);
    }
}
