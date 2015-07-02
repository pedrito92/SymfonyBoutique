<?php

namespace Store\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Store\FrontendBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=60, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="desciption", type="text", nullable=true)
     */
    private $desciption;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    private $product;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set desciption
     *
     * @param string $desciption
     * @return Category
     */
    public function setDesciption($desciption)
    {
        $this->desciption = $desciption;

        return $this;
    }

    /**
     * Get desciption
     *
     * @return string 
     */
    public function getDesciption()
    {
        return $this->desciption;
    }

    /**
     * Add product
     *
     * @param \Store\FrontendBundle\Entity\Product $product
     * @return Category
     */
    public function addProduct(\Store\FrontendBundle\Entity\Product $product)
    {
        $this->product[] = $product;
        return $this;
    }
    /**
     * Remove product
     *
     * @param \Store\FrontendBundle\Entity\Product $product
     */
    public function removeProduct(\Store\FrontendBundle\Entity\Product $product)
    {
        $this->product->removeElement($product);
    }
    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return string
     */
    public function __toString(){
        return $this->title;
    }
}
