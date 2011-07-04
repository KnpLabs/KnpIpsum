<?php

namespace Knp\IpsumBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Knp\IpsumBundle\Entity\TimedThing;

class TimedThingFixtures implements FixtureInterface
{
    public function load($em)
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
