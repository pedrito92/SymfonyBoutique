<?php

namespace Store\FrontendBundle\Controller;

use Store\FrontendBundle\Entity\Product;
use Store\FrontendBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    public function newAction(Request $request)
    {
        $product = new Product();

        $form = $this->createForm(new ProductType(), $product,
            array(
                'attr' => array(
                    'method' => 'post',
                    'novalidate' => 'novalidate'
                )
            ));

        $form->handleRequest($request);

        if($form->isValid()){
            return $this->redirectToRoute('store_frontend_accueil');
        }

        return $this->render('StoreFrontendBundle:Product:new.html.twig', array(
                'form' => $form->createView()
            ));    }

}
