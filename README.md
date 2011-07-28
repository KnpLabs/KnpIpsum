KnpIpsum: a demo Symfony2 application
=====================================

KnpIpsum is a demo application using the most successful bundles. It lets you
discover some of their features and shows you the code used to achieve the
result.

The demo is available online at http://ipsum.knplabs.com

Browse the code on [github](https://github.com/knplabs/KnpIpsum-for-symfony).

Requirements
------------

* You will need [git](http://git-scm.com/download) to get the project
* Check Symfony2 requirements

Installation
------------

    git clone git://github.com/knplabs/KnpIpsum-for-symfony.git
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

Doctrine ODM
------------

Note:
    Currently we are using MongoDB, so you need to have MongoDB installed
    and configured to be used with PHP. Also you don't have to create your
    database yourself, MongoDB can take care of it.

    If you don't have MongoDB installed go to [MongoDB Quickstart]
    (http://www.mongodb.org/display/DOCS/Quickstart)

To create the database and collections and load them with fixtures data:

    php app/console doctrine:mongodb:fixtures:load

If you just want to create the database and collections:

    php app/console doctrine:mongodb:schema:create

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
