KnpIpsum: a demo Symfony2 application
=====================================

KnpIpsum is a demo application using the most successful bundles. It lets you
discover some of their features and shows you the code used to achieve the
result.

So it's not exactly the Symfony2 tutorial we wanted first but rather a
comprehensive set of examples.

The demo is available online at http://knpipsum.knplabs.com

Browse the code on [github](https://github.com/knplabs/KnpIpsum-for-symfony).

You can also [download a clean ready-to-use zipball](http://j.mp/jeyTPY) 
as your base project (no git history).

Requirements
------------

* You will need [git](http://git-scm.com/download) to get the project
* Check Symfony2 requirements

Installation
------------

    git submodule update --init

To install the assets in the web folder, launch the following commands:

    php app/console assets:install web
    php app/console --env=prod --no-debug assetic:dump

Configuration
-------------

Should you need to overwrite the values used in the provided configuration,
you can configure the project by creating a `app/config/config_dev_local.yml`
and `app/config/config_prod_local.yml`.

To do that, just copy the corresponding `.dist` files.

Doctrine ORM
------------

To create the database launch the following commands:

    php app/console doctrine:database:create
    php app/console doctrine:schema:create

Note:
    The first command requires to have enough rights for your MySQL user
    to create the database. If it is not the case, create an empty database
    by hand and use the second command to create the tables.


DoctrineFixturesBundle
----------------------

To load the fixtures (default location in `src/Knp/IpsumBundle/DataFixtures/ORM`),
use the following command:

    php app/console doctrine:fixtures:load

BehatBundle
-----------

To launch behat tests (located in the bundle Features directory):

    php app/console --env=test behat:bundle KnpIpsumBundle

Swift Mailer
------------

To be able to send emails, please configure it in your local config. By default
it will look for a SMTP server on localhost without authentication.

Test it
-------

The main page of the application is configured at `/`. Access it via
`web/app_dev.php/`.

Reporting an issue
------------------

If you have some issue with KnpIpsum or if your bundle is not presented
the good way in the demo, please open a ticket on the
[github issue tracker](https://github.com/knplabs/KnpIpsum-for-symfony/issues)

Enjoy!
