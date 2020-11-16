<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GetLoginController extends AbstractController
{
    /**
     * @Route("/getLogin", name="getLogin")
     */
    public function index(Request $request, SessionInterface $session)
    {
        $session->set('usuario', $request->request->get('name'));
        $session->set('pwd', $request->request->get('password'));
        return $this->redirectToRoute('index');
        
    }
}
