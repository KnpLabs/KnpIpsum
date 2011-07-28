<?php

namespace Knp\IpsumBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Knp\IpsumBundle\Document\Product;
use Knp\IpsumBundle\Document\Category;


class ProductFixtures implements FixtureInterface
{
    public function load($dm)
    {
        $catFood = new Product();
        $catFood->setName('Cat Food');

        $catToy = new Product();
        $catToy->setName('Cat Toy');

        $categoryCat = new Category();
        $categoryCat->setName('Cat');

        $catFood->setCategory($categoryCat);
        $catToy->setCategory($categoryCat);

        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName('Dummy thing '.$i);
            $product->setCategory($categoryCat);
            $dm->persist($product);
        }

        $dm->persist($catFood);
        $dm->persist($catToy);
        $dm->persist($categoryCat);

        $dm->flush();
    }
}
