<?php

namespace Knp\IpsumBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
* @MongoDB\Document(repositoryClass="Knp\IpsumBundle\Document\Repository\ThingRepository")
*/
class Thing
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
    * @MongoDB\ReferenceOne(targetDocument="Knp\IpsumBundle\Document\Category", cascade={"persist"})
    */
    protected $category;

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
    * Set category
    *
    * @param Knp\IpsumBundle\Document\Category $category
    */
    public function setCategory(\Knp\IpsumBundle\Document\Category $category)
    {
        $this->category = $category;
    }

    /**
    * Get category
    *
    * @return Knp\IpsumBundle\Document\Category $category
    */
    public function getCategory()
    {
        return $this->category;
    }

    /**
    * Dummy method to show you that you can create methods
    *
    * @return string
    */
    public function identifyYourselfPlease()
    {
        $categoryName = $this->getCategory() ? $this->getCategory()->getName() : "(null)";
        return $this->getName().' in category '.$categoryName;
    }
}
