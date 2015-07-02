<?php

namespace Store\FrontendBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class ProductRepository
 *
 * @package Store\FrontendBundle
 */
class ProductRepository extends EntityRepository{

    /**
     *
     */
    public function getProductHomepage(){
        return $this->getEntityManager()
            ->createQuery("SELECT p
                            FROM StoreFrontendBundle:Product p
                            WHERE p.visible = :visible AND p.created < :today
                            ORDER BY p.title ASC")
            ->setParameter('visible', 1)
            ->setParameter('today', new \DateTime('now'))
            ->getResult();
    }

}