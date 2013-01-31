<?php

namespace Knp\IpsumBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Knp\IpsumBundle\Entity\User;

class FOSUserFixtures extends AbstractFixture
{
    public function load(ObjectManager $em)
    {
        $user = new User();
        $user->setUsername('john');
        $user->setPlainPassword('doe');
        $user->setEmail('john@doe.com');
        $user->setEnabled(true);

        $em->persist($user);

        $em->flush();
    }
}
