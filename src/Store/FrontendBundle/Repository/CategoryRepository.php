<?php

namespace Store\FrontendBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class ProductRepository
 *
 * @package Store\FrontendBundle
 */
class CategoryRepository extends EntityRepository{

    /**
     *
     */
    public function getCategoryHomepage(){
        return $this->getEntityManager()
            ->createQuery("SELECT c
                            FROM StoreFrontendBundle:Category c")
            ->getResult();
    }

}