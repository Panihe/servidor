<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CuentaController extends AbstractController
{
    /**
     * @Route("/cuenta", name="cuenta")
     */
    public function index(SessionInterface $session)
    {
        $username = $session->get('usuario');
        $userpwd = $session->get('pwd');
        $userlog = strlen($username)>0?"Hola ".$username:"";
        return $this->render('cuenta.html.twig', [
            'Nombre' => $username,
            'Contraseña' => $userpwd,
            'Usuario' => $userlog
        ]);
        
    }
}


