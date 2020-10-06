## This project is no longer maintained by KNP Labs

It is still good demo project to get started with Symfony2, but it will no longer receive updates.

KnpIpsum: a demo Symfony2 application
=====================================

KnpIpsum is a demo application using the most successful bundles. It lets you
discover some of their features and shows you the code used to achieve the
result.

The demo is available online at http://ipsum.knplabs.com

Browse the code on [github](https://github.com/knplabs/KnpIpsum).

Requirements
------------

* You will need [git](http://git-scm.com/download) to get the project
* Check Symfony2 requirements

Installation
------------

    git clone git://github.com/knplabs/KnpIpsum.git
    bin/vendors install

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
    If you don't have MongoDB installed go to
    [MongoDB Quickstart](http://www.mongodb.org/display/DOCS/Quickstart)

To create the database and collections and load them with fixtures data:

    php app/console doctrine:mongodb:fixtures:load

If you just want to create the database and collections:

    php app/console doctrine:mongodb:schema:create

BehatBundle
-----------

To launch behat tests (located in the bundle Features directory):

    php app/console --env=test behat @KnpIpsumBundle

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
[github issue tracker](https://github.com/knplabs/KnpIpsum/issues)

Enjoy!

## Maintainers

KNPLabs is looking for maintainers ([see why](https://knplabs.com/en/blog/news-for-our-foss-projects-maintenance)).

If you are interested, feel free to open a PR to ask to be added as a maintainer.

We’ll be glad to hear from you :)


## Credits

KNPIpsum has been originally developed by the [KnpLabs](http://knplabs.com) team.
