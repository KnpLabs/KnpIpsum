<?php

namespace Knp\IpsumBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUSer;
use Doctrine\ORM\Mapping as ORM;

/**
 * Knp\IpsumBundle\Entity\User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
