<?php

namespace App\Controller;

use App\Entity\Productos;
use App\Entity\Categoria;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ProductosController extends AbstractController
{
    /**
     * @Route("/productos/{product<Todos|Tazas|Camisetas|Bolsas|Libretas>?Todos}/{currentPage?1}", name="productos")
     */
    public function index(SessionInterface $session, EntityManagerInterface $entityManager, $product, $currentPage
    )
    {
        $username = $session->get('usuario');
        $userlog = strlen($username)>0?"Hola ".$username:"";

        if($product == 'Todos'){
            $yield=$this->getDoctrine()
	                ->getRepository(Productos::class)
                    ->findAll();
        }else{
            $categoria=$this->getDoctrine()
	                ->getRepository(Categoria::class)
                    ->findOneBy(['categoria'=>$product]); 
                    
            $yield=$categoria->getProductos();
        }

       

        return $this->render('productos.html.twig', [
            'Usuario' => $userlog,
            'data' => $yield,
            'currentPage' => $currentPage,
            'itemsPerPage' => 6
        ]);
        
        /*$username = $session->get('usuario');
        $userlog = strlen($username)>0?"Hola ".$username:"";
        return $this->render('productos.html.twig', [
            'Usuario' => $userlog,
            'data' => $this->productos[$product],
            'currentPage' => $currentPage,
            'itemsPerPage' => 6
        ]);*/
    }

    /*private $productos = [
        "Tazas" => [
            [
                "img" => "prod1.jpg",
                "titulo" => "Taza Let's go outside",
                "precio" => 7,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 4,
                "revisiones" => 16
            ],
            [
                "img" => "prod5.jpg",
                "titulo" => "Taza blanca",
                "precio" => 10,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 2,
                "revisiones" => 7
            ],
            [
                "img" => "prod6.jpg",
                "titulo" => "Taza blanca",
                "precio" => 12.50,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 3,
                "revisiones" => 24
            ],
            [
                "img" => "prod18.jpg",
                "titulo" => "Taza blanca",
                "precio" => 7.50,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 4,
                "revisiones" => 38
            ],
             
        ],
        "Camisetas" => [
            [
                "img" => "prod3.jpg",
                "titulo" => "Camiseta I love my tattoo",
                "precio" => 15,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 4,
                "revisiones" => 28   
            ],
            [
                "img" => "prod9.jpg",
                "titulo" => "Camiseta blanca",
                "precio" => 20,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 3,
                "revisiones" => 19   
            ],
            [
                "img" => "prod10.jpg",
                "titulo" => "Camiseta negra",
                "precio" => 25,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 5,
                "revisiones" => 24   
            ],
            [
                "img" => "prod11.jpg",
                "titulo" => "Camiseta negra",
                "precio" => 18,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 3,
                "revisiones" => 17  
            ],
            [
                "img" => "prod12.jpg",
                "titulo" => "Camiseta Samto",
                "precio" => 6.99,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 2,
                "revisiones" => 9  
            ],
            [
                "img" => "prod13.jpg",
                "titulo" => "Camiseta alas",
                "precio" => 5.75,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 1,
                "revisiones" => 6  
            ],
        ],
        "Bolsas" => [
            [
                "img" => "prod4.jpg",
                "titulo" => "Bolsa blanca",
                "precio" => 8,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 2,
                "revisiones" => 7 
            ],
            [
                "img" => "prod14.jpg",
                "titulo" => "Bolsa blanca",
                "precio" => 3,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 1,
                "revisiones" => 4  
            ],
            [
                "img" => "prod15.jpg",
                "titulo" => "Bolsa beis",
                "precio" => 12,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 4,
                "revisiones" => 16  
            ], 
            [
                "img" => "prod16.jpg",
                "titulo" => "Bolsa negra",
                "precio" => 25,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 5,
                "revisiones" => 39
            ],
            [
                "img" => "prod17.jpg",
                "titulo" => "Bolsa blanca",
                "precio" => 22.99,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 4,
                "revisiones" => 25 
            ],
        ],
        "Libretas" => [
            [
                "img" => "prod2.jpg",
                "titulo" => "Libreta marrón",
                "precio" => 3,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 1,
                "revisiones" => 8  
            ],
            [
                "img" => "prod7.jpg",
                "titulo" => "Libreta blanca",
                "precio" => 8.99,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 4,
                "revisiones" =>  17 
            ],
            [
                "img" => "prod8.jpg",
                "titulo" => "Libreta negra",
                "precio" => 15.99,
                "descripcion" => "Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.",
                "valoracion" => 5,
                "revisiones" => 27  
            ],
        ]
    ];*/
}
