<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class RecibeController extends AbstractController
{
    /**
     * @Route("/recibe", name="recibe")
     */
    public function index(Request $request, SessionInterface $session
    )
    {
        $UserName = $request->request->get('name');
        $UserEmail = $request->request->get('email');
        $UserSubject = $request->request->get('subject');
        $UserMessage = $request->request->get('message');
        $username = $session->get('usuario');
        $userlog = strlen($username)>0?"Hola ".$username:"";
        return $this->render('recibe.html.twig', [
            'Nombre' => $UserName,
            'Email' => $UserEmail,
            'Asunto' => $UserSubject,
            'Mensaje' => $UserMessage,
            'Usuario' => $userlog
        ]);
    }
}
