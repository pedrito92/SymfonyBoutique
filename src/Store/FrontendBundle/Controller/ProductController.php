<?php

namespace Store\FrontendBundle\Controller;

use Store\FrontendBundle\Entity\Product;
use Store\FrontendBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    public function newAction()
    {
        $product = new Product();

        $form = $this->createForm(new ProductType(), $product,
            array(
                'attr' => array(
                    'method' => 'post'
                )
            ));

        return $this->render('StoreFrontendBundle:Product:new.html.twig', array(
                'form' => $form->createView()
            ));    }

}
