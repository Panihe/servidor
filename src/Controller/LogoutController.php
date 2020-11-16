<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LogoutController extends AbstractController
{
    /**
     * @Route("/logout", name="logout")
     */
    public function index(SessionInterface $session)
    {
        $session->set('usuario', "");
        $session->set('pwd', "");
        return $this->redirectToRoute('index');
    }
}
