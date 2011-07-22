<?php

namespace Knp\IpsumBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
* @MongoDB\Document
*/
class Category
{
    /**
    * @MongoDB\Id
    */
    protected $id;

    /**
    * @MongoDB\String
    */
    protected $name;

    /**
    * @MongoDB\ReferenceMany(targetDocument="Knp\IpsumBundle\Document\Product", cascade={"persist"})
    */
    protected $product = array();
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add product
     *
     * @param Knp\IpsumBundle\Document\Product $product
     */
    public function addProduct(\Knp\IpsumBundle\Document\Product $product)
    {
        $this->product[] = $product;
    }

    /**
     * Get product
     *
     * @return Doctrine\Common\Collections\Collection $product
     */
    public function getProduct()
    {
        return $this->product;
    }
}