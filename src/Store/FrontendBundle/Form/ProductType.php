<?php

namespace Store\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                'label' => 'Titre du produit',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Titre du produit',
                    'pattern' => '[a-zA-Z0-9 ]{5,}'
                )
            ))
            ->add('description', null, array(
                'label' => 'Description du produit',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Description du produit',
                    'rows' => 5,
                    'cols' => 10,
                    'pattern' => '[a-zA-Z ]{35,}'
                )
            ))
            ->add('visible', null, array(
                'label' => 'Est-t-il visible?'
            ))
            ->add('created', null, array(
                'label' => 'Date de création'
            ))
            ->add('category', null, array(
                'label' => 'Catégorie du produit',
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('tag', null, array(
                'label' => 'Tag du produit',
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('Enregistrer', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-primary'
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Store\FrontendBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'store_frontendbundle_product';
    }
}
