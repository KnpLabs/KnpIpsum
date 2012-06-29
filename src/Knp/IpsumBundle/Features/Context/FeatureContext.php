<?php

namespace Knp\IpsumBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\Behat\Context\Step\Given;

use Knp\IpsumBundle\Entity\Thing,
    Knp\IpsumBundle\Entity\TimedThing;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Feature context.
 */
class FeatureContext extends MinkContext implements KernelAwareInterface
{
    private $kernel;
    private $parameters;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Sets HttpKernel instance.
     * This method will be automatically called by Symfony2Extension ContextInitializer.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @Given /^I am on homepage$/
     */
    public function iAmOnHomepage()
    {
        return new Given('I am on "/"');
    }

    /**
     * @Given /^I am on Doctrine ODM \(MongoDB\) page$/
     */
    public function iAmOnDoctrineODMMongoDBPage()
    {
        return new Given('I am on "/doctrine-odm"');
    }

    /**
     * @Given /^I am on Doctrine ORM page$/
     */
    public function iAmOnDoctrineORMPage()
    {
        return new Given('I am on "/doctrine-orm"');
    }

    /**
     * @Given /^I am on Form page$/
     */
    public function iAmOnFormPage()
    {
        return new Given('I am on "/form"');
    }

    /**
     * @Given /^I am on Secured page$/
     */
    public function iAmOnSecuredPage()
    {
        return new Given('I am on "/secured"');
    }

    /**
     * @Given /^I am not logged in$/
     */
    public function iAmNotLoggedIn()
    {
        $this->getMink()
            ->getSession()
            ->visit($this->locatePath('/secured/logout'))
        ;
    }

    /**
     * @Given /^there are no things in database$/
     */
    public function thereAreNoThingsInDatabase()
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
        $this->thereAreNoThingsInDatabase();

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

    /**
     * @Given /^there are no products in collection$/
     */
    public function thereAreNoProductsInCollection()
    {
        $this->getDocumentManager()
            ->createQueryBuilder('KnpIpsumBundle:Product')
            ->remove()
            ->getQuery()
            ->execute();
    }

    protected function getEntityManager()
    {
        return $this->kernel->getContainer()->get('doctrine')->getEntityManager();
    }

    protected function getDocumentManager()
    {
        return $this->kernel->getContainer()->get('doctrine.odm.mongodb.document_manager');
    }
}
