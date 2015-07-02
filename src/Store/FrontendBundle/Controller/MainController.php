<?php

namespace Store\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class MainController
 *
 * @package Store\FrontendBundle\Controller
 */
class MainController extends Controller
{
    /**
     * Page d'Accueil
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homepageAction ( )
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('StoreFrontendBundle:Product')->findAll();
        $product = $em->getRepository('StoreFrontendBundle:Product')->find(2);
        $productsVisible = $em->getRepository('StoreFrontendBundle:Product')->findByVisible(0);
        $productsHomepage = $em->getRepository('StoreFrontendBundle:Product')->getProductHomepage();
        $categories = $em->getRepository('StoreFrontendBundle:Category')->findAll();


        return $this->render ( 'StoreFrontendBundle:Main:homepage.html.twig', [
            "description"=> "Ventes de Bijoux",
            "keywords" => "bijoux",
            "today" => new \DateTime(),
            "tags"=> [
                "Bijoux Fantasies",
                "Bijoux Créateurs",
                "Bijoux fait main"
            ],
            "title" => "détails",
            "products" => $products,
            "visible" => $productsVisible,
            "categories" => $categories,
            "product" => $product,
            "homepage" => $productsHomepage
        ] );
    }
}
