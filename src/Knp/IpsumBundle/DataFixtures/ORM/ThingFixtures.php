<?php

namespace Knp\IpsumBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Knp\IpsumBundle\Entity\Thing;
use Knp\IpsumBundle\Entity\Category;

class ThingFixtures extends AbstractFixture
{
    public function load(ObjectManager $em)
    {
        $cat = new Thing();
        $cat->setName('Edgar the Cat');

        $bull = new Thing();
        $bull->setName('Joe the bull');

        $categoryRed = new Category();
        $categoryRed->setName('Red');

        $cat->setCategory($categoryRed);
        $bull->setCategory($categoryRed);

        for ($i = 0; $i < 20; $i++) {
            $thing = new Thing();
            $thing->setName('Dummy thing '.$i);
            $thing->setCategory($categoryRed);
            $em->persist($thing);
        }

        $em->persist($cat);
        $em->persist($bull);
        $em->persist($categoryRed);

        $em->flush();
    }
}
