<?php

namespace Knp\IpsumBundle\Features\Context;

use Behat\BehatBundle\Context\BehatContext,
    Behat\BehatBundle\Context\MinkContext;
use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Exception\Pending;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Knp\IpsumBundle\Entity\Thing,
    Knp\IpsumBundle\Entity\TimedThing;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Feature context.
 */
class FeatureContext extends MinkContext
{
    /**
     * @Given /^there is no things in database$/
     */
    public function thereIsNoThingsInDatabase()
    {
        $this->getEntityManager()
            ->createQuery('DELETE KnpIpsumBundle:Thing')
            ->execute();
    }

    /**
     * @Given /^there are (\d+) things in database$/
     */
    public function thereAreThingsInDatabase($count)
    {
        $this->thereIsNoThingsInDatabase();

        $em = $this->getEntityManager();
        for ($i = 0; $i < intval($count); $i++) {
            $thing = new Thing();
            $thing->setName('Lorem #'.$i);
            $em->persist($thing);
        }
        $em->flush();
    }

    /**
     * @Given /^there are (\d+) timed things in database$/
     */
    public function thereAreTimedThingsInDatabase($count)
    {
        $em = $this->getEntityManager();

        $em->createQuery('DELETE KnpIpsumBundle:TimedThing')
           ->execute();

        for ($i = 0; $i < intval($count); $i++) {
            $thing = new TimedThing();
            $thing->setName('Lorem #'.$i);
            $thing->setContent('text #'.$i);
            $em->persist($thing);
        }
        $em->flush();
    }

    protected function getEntityManager()
    {
        return $this->getContainer()->get('doctrine')->getEntityManager();
    }
}
