<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\DoctrineBundle\DoctrineBundle(),
            new Symfony\Bundle\DoctrineMigrationsBundle\DoctrineMigrationsBundle(),
            new Symfony\Bundle\DoctrineFixturesBundle\DoctrineFixturesBundle(),
            new Symfony\Bundle\DoctrineMongoDBBundle\DoctrineMongoDBBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new Avalanche\Bundle\ImagineBundle\AvalancheImagineBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new FOS\RestBundle\FOSRestBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
            new Sonata\jQueryBundle\SonatajQueryBundle(),
            new Sonata\BluePrintBundle\SonataBluePrintBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Knp\IpsumBundle\KnpIpsumBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        if ('test' === $this->getEnvironment()) {
            $bundles[] = new Behat\MinkBundle\BehatMinkBundle();
            $bundles[] = new Behat\BehatBundle\BehatBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getLocalConfigurationFile($this->getEnvironment()));
    }

    /**
     * Returns the config_{environment}_local.yml file or
     * the default config_{environment}.yml if it does not exist.
     * Useful to override development password.
     *
     * @param string Environment
     * @return The configuration file path
     */
    protected function getLocalConfigurationFile($environment)
    {
        $basePath = __DIR__.'/config/config_';
        $file = $basePath.$environment.'_local.yml';

        if(\file_exists($file)) {
            return $file;
        }

        return $basePath.$environment.'.yml';
    }
}
