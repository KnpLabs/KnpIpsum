<?php

namespace Knp\IpsumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Knp\IpsumBundle\Repository\ThingRepository")
 */
class Thing
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length="255")
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Knp\IpsumBundle\Entity\Category", inversedBy="things")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

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

    /**
     * Get id
     *
     * @return string
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set category
     *
     * @param Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function __toString()
    {
        return $this->identifyYourselfPlease();
    }
}
