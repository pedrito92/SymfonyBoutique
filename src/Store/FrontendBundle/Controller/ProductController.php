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

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new ProductType(), $product,
            array(
                'attr' => array(
                    'method' => 'post',
//                    'novalidate' => 'novalidate'
                )
            ));

        $form->handleRequest($request);

        if($form->isValid()){

            //save in database
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('store_frontend_accueil');
        }

        return $this->render('StoreFrontendBundle:Product:new.html.twig', array(
                'form' => $form->createView()
            ));
    }

    public function editAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('StoreFrontendBundle:Product')->find((int)$id);

        $form = $this->createForm(new ProductType(), $product,
            array(
               'attr' => array(
                   'method' => 'post'
               )
            ));

        $form->handleRequest($request);

        if($form->isValid()){

            //save in database
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('store_frontend_accueil');
        }

        return $this->render('StoreFrontendBundle:Product:edit.html.twig', array(
            'form' => $form->createView(),
            'product' => $product
        ));
    }

    public function itemAction($id){
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('StoreFrontendBundle:Product')->find((int)$id);

        return $this->render('StoreFrontendBundle:Product:item.html.twig', array(
            'product' => $product
        ));
    }

    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('StoreFrontendBundle:Product')->find((int)$id);

        $em->remove($product);
        $em->flush();

        return $this->render('StoreFrontendBundle:Main:homepage.html.twig');
    }

}
