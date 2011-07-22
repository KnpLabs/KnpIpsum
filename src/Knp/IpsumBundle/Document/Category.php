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
    * @MongoDB\ReferenceMany(targetDocument="Knp\IpsumBundle\Document\Thing", cascade={"persist"})
    */
    protected $thing = array();

    public function __construct()
    {
        $this->thing = new \Doctrine\Common\Collections\ArrayCollection();
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
    * Add thing
    *
    * @param Knp\IpsumBundle\Document\Thing $thing
    */
    public function addThing(\Knp\IpsumBundle\Document\Thing $thing)
    {
        $this->thing[] = $thing;
    }

    /**
    * Get thing
    *
    * @return Doctrine\Common\Collections\Collection $thing
    */
    public function getThing()
    {
        return $this->thing;
    }
}
