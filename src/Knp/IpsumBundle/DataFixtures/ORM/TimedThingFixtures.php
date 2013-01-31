<?php

namespace Knp\IpsumBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Knp\IpsumBundle\Entity\TimedThing;

class TimedThingFixtures extends AbstractFixture
{
    public function load(ObjectManager $em)
    {
        $cat = new TimedThing();
        $cat->setName('Edgar the Cat');
        $cat->setContent('Edgar is happy');

        $bull = new TimedThing();
        $bull->setName('Joe the bull');
        $bull->setContent('Joe is sad');

        $em->persist($cat);
        $em->persist($bull);

        $em->flush();
    }
}
